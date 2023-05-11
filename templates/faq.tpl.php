<?php function drawFAQHeader($CurDepartment, $departments, $client){ ?>
  <main class="main_content">
    <header class="header">
      <h1 class="faq_title">FAQ</h1>
      <?php if ($client->isAgent) { ?>
        <form action="../actions/addFAQ.php" method="post">
          <input type="hidden" name="department" value="<?= $CurDepartment ?>">
          <input type="submit" value="Add">
        </form>
      <?php } ?>
      <select name="department" id="dept_select" onchange="updateURL()">
        <option value="">Departments</option>
        <?php foreach ($departments as $department) { ?>
          <option value="<?= $department->department_id ?>" <?= $department->department_id === $CurDepartment ? 'selected' : '' ?>><?= $department->name ?></option>
        <?php } ?>
      </select>
    </header>
<?php } ?>

<?php function drawFAQ($questions){ ?>
  <ul class="faq">
    <?php foreach($questions as $question) { ?>
      <li>
        <div class="question" onclick="toggleAnswer(this)">
          <span class="question_text">Q<?= $question->num ?> <?= $question->title ?></span>
          <span class="plus-sign">+</span>
        </div>
        <div class="answer" style="display: none;">
          <span class="answer_text"><?= $question->content ?></span>
        </div>
      </li>
    <?php } ?>
  </ul>
  </main>
  </body>

  </html>
<?php } ?>