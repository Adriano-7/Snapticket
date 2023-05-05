<?php function drawFAQ($faq, $db)
{
?>
  <section id="faq">
    <h2>FAQ</h2>
    <div class="faq-container">
      <?php
      foreach ($faqs as $faq) {
      ?>
        <div class="faq">
          <h3><?= $faq['question'] ?></h3>
          <p><?= $faq['answer'] ?></p>
        </div>
      <?php
      }
      ?>
    </div>
  </section>
<?php
}