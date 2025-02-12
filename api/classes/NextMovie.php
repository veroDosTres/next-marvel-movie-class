<?php

declare(strict_types=1);

class NextMovie
{
  public function __construct(
    private string $title,
    private int $days_until,
    private string $release_date,
    private string $poster_url,
    private string $following_production,
    private string $overview
  ) {}

  public function get_until_message(): string
  {
    $days = $this->days_until;
    return match (true) {
      $days == 0 => "Hoy se estrena! 🎉",
      $days == 1 => "Mañana se estrena! 🚀 ",
      $days < 7  => "Se estrena esta semana 😱",
      $days < 30 => "Se estrena este mes 📅 ",
      default    => "$days hasta el estreno 📅"
    };
  }

  public static function fetch_and_create_movie(string $api_url): NextMovie
  {
    $result = file_get_contents($api_url);
    $data = json_decode($result, true);

    return new self(
      $data["title"],
      $data["days_until"],
      $data["release_date"],
      $data["poster_url"],
      $data["following_production"]["title"] ?? "Desconocido",
      $data["overview"]
    );
  }

  public function get_data()
  {
    return get_object_vars($this);
  }
}
