  <body>
    <main>
      <h1>La próxima película de Marvel</h1>
      <section>
        <img
          src="<?= $poster_url; ?>" width="300" alt="Poster de la película <?= $title; ?>"
          style="border-radius: 16px; box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5);">
      </section>
      <hgroup>
        <h3><?= $title; ?> - <?= $until_message; ?></h3>
        <p>Fecha de estreno: <?= (new DateTime($release_date))->format('d/m/Y'); ?> - Quedan <?= $days_until; ?> días.</p>
        <p>La siguiente película es: "<?= $following_production; ?>"</p>
      </hgroup>
    </main>
  </body>
</html>