<?php function drawFAQHeader($faq_id, $departments, $client){ ?>
  <main>
    <div class="faq_header">
      <h1>FAQ</h1>
      <div class="Buttons">
        <?php if ($client->isAgent) { ?>
          <form action="../pages/editFaq.php" method="post">
            <input type="hidden" name="faq_id" value="<?=$faq_id?>">
            <input type="submit" value="Edit">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
          </form>
        <?php } ?>
        <select name="department" id="dept_select" onchange="updateURL()">
          <option value="0" <?php if($faq_id==0) echo 'selected'?>>Departments</option>
          <?php foreach ($departments as $department) { ?>
            <option value="<?=$department->department_id?>" <?=$department->department_id === $faq_id ? 'selected' : ''?>><?= $department->name ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
<?php } ?>

<?php function drawFAQ($questions){ ?>
    <ul>
    <?php foreach ($questions as $question) { ?>
        <li onclick="toggleAnswer(this)">
          <div class="question">
            <span class="question_text">Q<?=$question->num?> : <?=$question->title ?></span>
            <img src="../assets/icons/arrow-down.svg" class="down-sign">
          </div>
          <div class="answer" style="display: none;"><?=$question->content ?></div>
        </li>
    <?php } ?>
    </ul>
  </main>
  </body>
</html>
<?php } ?>