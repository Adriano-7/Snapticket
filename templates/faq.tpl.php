<?php function drawFAQHeader($CurDepartment, $departments, $client)
{ ?>
  <main>
    <div class="faq_header">
      <h1>FAQ</h1>
      <div class="Buttons">
        <?php if ($client->isAgent) { ?>
          <form action="../actions/faq/add_faq.action.php" method="post">
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
      </div>
    </div>
  <?php } ?>

  <?php function drawFAQ($questions)
  { ?>
    <ul>
      <?php foreach ($questions as $question) { ?>
        <li onclick="toggleAnswer(this)">
          <div class="question">
            <span class="question_text">Q
              <?= $question->num ?>:
              <?= $question->title ?>
            </span>
            <img src="../assets/arrow-down.svg" class="down-sign">
          </div>
          <div class="answer" style="display: none;">
              <?= $question->content ?>
          </div>
        </li>
      <?php } ?>
    </ul>
  </main>
  </body>

  </html>
<?php } ?>