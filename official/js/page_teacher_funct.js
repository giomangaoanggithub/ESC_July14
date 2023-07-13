// this javascript program runs all the necessary operations needed on live during the use of the page_teacher.php
// operations like button clicks to request certain data or even a mouse hover to make it responsive

// this button click logs out the user
$("#logout-btn").click(function () {
  $.get(
    current_hosting_url + "php/js-request/current_session_destroy.php",
    function () {
      window.location = current_hosting_url + "pages/page_register_login.php";
    }
  );
});

// this button click publishes a question to the students to answer
$("#post-question").click(function () {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("show-loading").style.display = "block";
  $.post(
    current_hosting_url + "php/ml_all_steps.php",
    {
      question: document.getElementById("post-question-content").value,
      hps: document.getElementById("choose-grade").value,
      due: document.getElementById("due-input").value,
    },
    function (response) {
      $.get(
        current_hosting_url + "php/js-request/page_teacher_start_data.php",
        function (data) {
          data = JSON.parse(data);
          if (data.length > 0) {
            document.getElementById("if-empty-table-question").style.display =
              "none";
            $("#teacher-left-side-table-tr").empty();
            for (i = 0; i < data.length; i++) {
              arr_questions.push(data[i]["question"]);
              arr_collected_links.push(data[i]["collected_links"]);
              arr_time_of_issue.push(data[i]["time_of_issue"]);
              arr_grades.push(data[i]["HPS"]);
              $("#teacher-left-side-table-tr").append(
                "<tr><td>" +
                  data[i]["question"] +
                  "</td><td>" +
                  data[i]["HPS"] +
                  "</td><td>" +
                  data[i]["due_date"] +
                  "</td><td><span class='material-icons'>edit</span><span class='material-icons'>delete</span></td></tr>"
              );
            }
          }
          document.getElementById("overlay").style.display = "none";
          document.getElementById("show-loading").style.display = "none";
          alert(response);
        }
      );
    }
  );
});

// this button click unblurs or blurs the course code
$("#account-course-code-show").click(function () {
  if (
    document.getElementById("account-course-code-show").innerHTML ==
    "visibility_off"
  ) {
    document.getElementById("account-course-code").style.color = "black";
    document.getElementById("account-course-code").style.textShadow = "none";
    document.getElementById("account-course-code-show").innerHTML =
      "visibility";
  } else {
    document.getElementById("account-course-code").style.color = "transparent";
    document.getElementById("account-course-code").style.textShadow =
      "0 0 8px #000";
    document.getElementById("account-course-code-show").innerHTML =
      "visibility_off";
  }
});

//this button shows the prompt to change the account's username
$("#edit-username").click(function () {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("green-prompt").style.display = "block";
  document.getElementById("insert-title").innerHTML = "Changing Username";
  document.getElementById("green-prompt-content").innerHTML =
    "<h2>Username:</h2><input id='new-username-input' value='" +
    document.getElementById("inserted-name").innerHTML +
    "'><br><br><button onclick='cancel_btn_function()'>CANCEL</button><button onclick='apply_change_username()'>APPLY</button>";
});

// this button click closes the overlay and the prompt form
function cancel_btn_function() {
  document.getElementById("overlay").style.display = "none";
  document.getElementById("green-prompt").style.display = "none";
}

// this button confirms the change of the account's username
function apply_change_username() {
  if (
    document.getElementById("inserted-name").innerHTML ==
    document.getElementById("new-username-input").value
  ) {
    alert("You still have the same Username");
  } else {
    $.post(
      current_hosting_url + "php/js-request/change_username.php",
      {
        username: document.getElementById("new-username-input").value,
        role: 1,
      },
      function (data) {
        alert(data);
        document.getElementById("inserted-name").innerHTML =
          document.getElementById("new-username-input").value;
        cancel_btn_function();
      }
    );
  }
}

function click_tr_question(num) {
  $.post(
    current_hosting_url + "php/js-request/page_teacher_fetch_question_data.php",
    { question_id: num },
    function (data) {
      // alert(data);
      data = JSON.parse(data);
      document.getElementById("show-current-question").style.display = "none";
      $("#teacher-right-side-table-tr").empty();
      if (data.length > 0) {
        for (i = 0; i < data.length; i++) {
          arr_grade = data[i]["grades"].split("<&,&>");
          word_count = data[i]["answers"].split(" ").length;
          calc_grammar = Math.round((arr_grade[1] / word_count) * 100) / 100;
          if (arr_grade[2] * 100 >= 40) {
            calculated_grade =
              Math.round((arr_grade[0] / 100) * data[i]["HPS"]) -
              Math.round((arr_grade[0] / 100) * data[i]["HPS"]) * calc_grammar +
              " / " +
              data[i]["HPS"];
            $("#teacher-right-side-table-tr").append(
              "<tr><td>" +
                data[i]["time_of_submission"] +
                "<br><br>" +
                data[i]["answers"] +
                "</td><td>" +
                calculated_grade +
                "</td><td>" +
                data[i]["username"] +
                '</td><td><span class="material-icons">edit</span></td></tr>'
            );
          } else {
            calculated_grade = 0.05 * data[i]["HPS"];
            $("#teacher-right-side-table-tr").append(
              "<tr><td>" +
                data[i]["time_of_submission"] +
                "<br><br>" +
                data[i]["answers"] +
                "</td><td>" +
                calculated_grade +
                "</td><td>" +
                data[i]["username"] +
                '</td><td><span class="material-icons">edit</span></td></tr>'
            );
          }
        }
      } else {
        document.getElementById("show-current-question").style.display =
          "table-cell";
      }
    }
  );
}

function disconnect_function(input) {
  confirming_disconnection = input;
  chosen_connection =
    arr_connections[arr_connections_id.indexOf(input.toString())];
  student = arr_connections[arr_connections_id.indexOf(input.toString())];
  document.getElementById("overlay").style.display = "block";
  document.getElementById("green-prompt").style.display = "block";
  document.getElementById("insert-title").innerHTML = "Disconnect?";
  document.getElementById("green-prompt-content").style.height = "5vh";
  document.getElementById("green-prompt-content").innerHTML =
    "Do you want to disconnect Teacher <strong>" +
    student +
    "</strong>?<br>You can reconnect via course code, if it is a mistake later on.<br><button onclick='cancel_btn_function()'>CANCEL</button><button onclick='confirm_disconnection()'>YES</button>";
}

function confirm_disconnection() {
  $.post(
    current_hosting_url + "php/js-request/user_disconnect.php",
    {
      connection_id: confirming_disconnection,
      connection_name: chosen_connection,
    },
    function (data) {
      alert(data);
      window.location = current_hosting_url + "pages/page_teacher.php";
    }
  );
}

function show_edit_question_prompt(input_id) {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("green-prompt").style.display = "block";
  document.getElementById("insert-title").innerHTML = "Edit Mode (coming soon)";
  question = arr_questions[arr_questions_id.indexOf(input_id.toString())];
  links =
    arr_collected_links[arr_questions_id.indexOf(input_id.toString())].split(
      "<&,&>"
    );
  links_spanners = "";
  for (i = 0; i < links.length; i++) {
    links_spanners +=
      "<span class='highlightable-sources'><span class='delete-source material-icons'>delete</span>• " +
      links[i] +
      "</span><br>";
  }
  links_spanners =
    "<div id='linkspanner_scrollable'>" + links_spanners + "</div>";
  document.getElementById("green-prompt-content").innerHTML =
    "<span>" +
    question +
    "</span><br><br><input type='text' id='rewrite-question' placeholder='Rewrite question here...'><br><br>Sources:<div style='width: 100%; border: 2px solid #379683'></div><br>" +
    links_spanners +
    "<br><br><div style='width: 100%; border: 2px solid #379683'></div><button onclick='cancel_btn_function()'>CANCEL</button>";
}

function open_machine_knowledge() {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("green-prompt").style.display = "block";
  document.getElementById("insert-title").innerHTML = "Your References";
  output = "";
  for (i = 0; i < arr_teacher_filenames.length; i++) {
    output +=
      `<span class='delete-source material-icons' onclick='delete_file("` +
      current_user +
      `","` +
      arr_teacher_filenames[i] +
      `", ` +
      i +
      `)'>delete</span><span class='highlightable-sources' onclick='open_file("` +
      current_user +
      `","` +
      arr_teacher_filenames[i] +
      `")'>• ` +
      arr_teacher_filenames[i] +
      "</span><br>";
  }
  output = "<div id='referencespanner_scrollable'>" + output + "</div>";
  document.getElementById("green-prompt-content").innerHTML =
    `<span>This is where you put all your <strong>references</strong> for the machine to <strong>read 
  and learn</strong>, in order for the machine to <strong>check essays</strong> for you. More references, the better.
  </span><br>Keep in mind, make sure your questions can be <strong>found</strong> from one of your references.<br><br>
  Upload your reference here: <input type="file" name="fileToUpload" id="fileToUpload"><button id="upload-file" onclick='upload_file_function()'>UPLOAD</button><br><br>
  Sources:<div style='width: 100%; border: 2px solid #379683'></div>` +
    output +
    `<div style='width: 100%; border: 2px solid #379683'></div><br><button onclick='cancel_btn_function()'>BACK</button>`;
}

function open_file(input1, input2) {
  window.open(current_hosting_url + "user_files/" + input1 + "/" + input2);
}

function delete_file(input1, input2, input3) {
  $.post(
    current_hosting_url + "php/js-request/delete_teacher_file.php",
    { user_folder: input1, user_file: input2 },
    function (data) {
      alert(data);

      index = arr_teacher_filenames.indexOf(arr_teacher_filenames[input3]);
      if (index > -1) {
        // only splice array when item is found
        arr_teacher_filenames.splice(index, 1); // 2nd parameter means remove one item only
      }

      document.getElementsByClassName("delete-source")[input3].style.display =
        "none";
      document.getElementsByClassName("highlightable-sources")[
        input3
      ].style.display = "none";
    }
  );
}

function upload_file_function() {
  variable = document.getElementById("fileToUpload").value;
  variable = variable.replace("C:\\fakepath\\", "");
  // alert(variable);
  arr_filetypes = [".docx", ".doc", ".pdf", ".txt"];
  outcome = 0;
  for (i = 0; i < arr_filetypes.length; i++) {
    if (
      document.getElementById("fileToUpload").value.includes(arr_filetypes[i])
    ) {
      outcome++;
    }
  }
  if (outcome > 0) {
    // alert("upload");

    let formData = new FormData();
    formData.append("file", document.getElementById("fileToUpload").files[0]);
    fetch(current_hosting_url + "php/js-request/upload_teacher_file.php", {
      method: "POST",
      body: formData,
    });
    load_references();
    alert("The file has been uploaded successfully.");
    location.reload();
  } else {
    alert("Sorry, this website does not support that kind of file");
  }
}
