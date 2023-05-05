<?php function drawFAQ($faq, $db)
{
?>
  <section id="faq">
    <h2>FAQ</h2>
    <div class="faq-container">
      <?php
      $stmt = $db->prepare('SELECT * FROM faq WHERE department_id = ?');
      $stmt->execute([$faq->department->department_id]);
      $faqs = $stmt->fetchAll();
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