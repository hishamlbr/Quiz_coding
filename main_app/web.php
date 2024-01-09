<?php 
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 90vh;
      background-color: #f4f4f4;
    }
    .title {
            text-align: center;
            margin-bottom: 40px;
            
            padding: 10px;
            
            position: absolute;
            top: 0;
            left: 0;
            width: 100%; /* Set width to 100% to span the entire viewport */
            box-sizing: border-box; /* Include padding and border in the total width */
        }

        .title h1 {
            color: #007bff;
        }

        .title p {
            font-style: italic;
        }

    .quiz-container {
      max-width: 600px;
      width: 100%;
      padding: 20px;
      background: linear-gradient(to left);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      box-sizing: border-box;
      text-align: center;
      overflow: hidden;
      margin-top: 60px;
      
    }

    .question {
      margin-bottom: 20px;
      font-size: 18px;
      font-weight: bold;
    }

    .choices {
      text-align: left;
      margin-bottom: 20px;
    }

    .choices label {
      display: block;
      margin-bottom: 10px;
      background-color: #ddd;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .choices label:hover {
      background-color: #ccc;
    }

    .submit-btn {
      color: white;
      background-color: #FF7D2C;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .submit-btn:hover {
      background-color: #11CCF5;
    }

    .progress-bar {
      width: 100%;
      height: 20px;
      background-color: #ddd;
      border-radius: 5px;
      margin-bottom: 20px;
      overflow: hidden;
    }

    .progress-bar-inner {
      height: 100%;
      width: 0;
      background-color: #FF7D2C;
      transition: width 0.5s ease-in-out;
    }

    .result {
      font-weight: bold;
      margin-top: 20px;
      font-size: 20px;
    }
  </style>
  <title>Quiz App</title>
</head>
<body>

<header class="title">
        <h1>Welcome to <span style="font-weight: bold;">Web Quiz</span></h1>
        <p>Test your Web technologies knowledge !</p>
</header>

<?php include "sidebar.php";?>

<div class="quiz-container">
  <div class="progress-bar">
    <div class="progress-bar-inner" id="progress-bar-inner"></div>
  </div>
  <div class="question" id="question"></div>
  <div class="choices" id="choices"></div>
  <button class="submit-btn" onclick="submitAnswer()">Submit Answer</button>
  <div class="result" id="result"></div>
</div>

<script>
const questionSets = [
// Level 1: Easy
  [
    {
      question: "What does HTML stand for?",
      choices: ["Hyper Text Markup Language", "High Tech Machine Learning", "Hyper Transfer Markup Language", "Hyperlink and Text Markup Language"],
      correctAnswer: "Hyper Text Markup Language"
    },
    {
      question: "Which CSS property is used to change the text color of an element?",
      choices: ["color", "text-color", "font-color", "text-style"],
      correctAnswer: "color"
    },
    {
      question: "What is the purpose of the JavaScript 'alert' function?",
      choices: ["To display a message box with a message and an OK button", "To create a pop-up window", "To log a message to the console", "To display a message on the webpage"],
      correctAnswer: "To display a message box with a message and an OK button"
    },
    {
      question: "In PHP, how do you concatenate two strings?",
      choices: ["str_concat()", "concat()", "string_concat()", "Use the '.' operator"],
      correctAnswer: "Use the '.' operator"
    },
    {
      question: "Which HTML tag is used to define an unordered list?",
      choices: ["<ol>", "<dl>", "<list>", "<ul>"],
      correctAnswer: "<ul>"
    },
    {
      question: "What does SQL stand for?",
      choices: ["Structured Query Language", "Simple Question Language", "Scripted Query Language", "Sequential Query Language"],
      correctAnswer: "Structured Query Language"
    },
    {
      question: "In CSS, what property is used to set the background color of an element?",
      choices: ["background-color", "color", "bgcolor", "bg-color"],
      correctAnswer: "background-color"
    },
    {
      question: "How do you comment multiple lines in JavaScript?",
      choices: ["// This is a comment", "/* This is a comment */", "# This is a comment", "' This is a comment"],
      correctAnswer: "/* This is a comment */"
    },
    {
      question: "What is the purpose of the PHP 'echo' statement?",
      choices: ["To display a message on the webpage", "To create a pop-up window", "To log a message to the console", "To output data to the browser"],
      correctAnswer: "To output data to the browser"
    },
    {
      question: "Which HTML tag is used to define a hyperlink?",
      choices: ["<link>", "<a>", "<href>", "<hyperlink>"],
      correctAnswer: "<a>"
    },
  ],

  // Level 2: Intermediate
  [
    {
      question: "What is the CSS 'box-model' used for?",
      choices: ["Defining the layout and design of elements", "Creating 3D effects", "Styling input elements", "Defining animation properties"],
      correctAnswer: "Defining the layout and design of elements"
    },
    {
      question: "In JavaScript, what is the purpose of the 'addEventListener' method?",
      choices: ["To add event handlers to elements", "To create a new element", "To modify the DOM structure", "To define global variables"],
      correctAnswer: "To add event handlers to elements"
    },
    {
      question: "What is the purpose of the PHP 'include' statement?",
      choices: ["To import external scripts or files", "To create a new variable", "To define a function", "To add comments to the code"],
      correctAnswer: "To import external scripts or files"
    },
    {
      question: "How can you prevent SQL injection in PHP?",
      choices: ["By using prepared statements and parameterized queries", "By encrypting the database", "By disabling user input", "By using JavaScript validation"],
      correctAnswer: "By using prepared statements and parameterized queries"
    },
    {
      question: "In HTML, which tag is used to create a line break?",
      choices: ["<br>", "<lb>", "<break>", "<newline>"],
      correctAnswer: "<br>"
    },
    {
      question: "What does the JavaScript 'this' keyword refer to?",
      choices: ["The current function", "The parent element", "The global object", "The current object"],
      correctAnswer: "The current object"
    },
    {
      question: "Which PHP function is used to open a file for writing?",
      choices: ["file_open()", "open_file()", "fopen() with mode 'w'", "write_file()"],
      correctAnswer: "fopen() with mode 'w'"
    },
    {
      question: "What is the purpose of the CSS 'position' property?",
      choices: ["To specify the positioning method used for an element", "To set the font size of text", "To define animation properties", "To create 3D effects"],
      correctAnswer: "To specify the positioning method used for an element"
    },
    {
      question: "In JavaScript, how do you declare a variable?",
      choices: ["var x;", "variable x;", "x = var;", "declare x;"],
      correctAnswer: "var x;"
    },
    {
      question: "Which SQL clause is used to filter the results of a SELECT statement?",
      choices: ["FILTER BY", "WHERE", "LIMIT", "SEARCH"],
      correctAnswer: "WHERE"
    },
  ],

  // Level 3: Advanced
  [
    {
      question: "What is the purpose of the HTML 'data-*' attribute?",
      choices: ["To store custom data private to the page or application", "To define the language of the document", "To specify the character encoding", "To set the document title"],
      correctAnswer: "To store custom data private to the page or application"
    },
    {
      question: "Explain the concept of 'CSS Flexbox'.",
      choices: ["A layout model for designing complex web applications", "A grid-based layout system", "A framework for building responsive websites", "A flexible box layout model for designing one-dimensional layouts"],
      correctAnswer: "A flexible box layout model for designing one-dimensional layouts"
    },
    {
      question: "What is the purpose of the JavaScript 'Promise' object?",
      choices: ["To handle asynchronous operations and deferred computations", "To create interactive forms", "To define global variables", "To manage cookies"],
      correctAnswer: "To handle asynchronous operations and deferred computations"
    },
    {
      question: "In PHP, what is the use of the 'mysqli' extension?",
      choices: ["To connect to MySQL databases and perform queries", "To handle file uploads", "To create RESTful APIs", "To manage sessions"],
      correctAnswer: "To connect to MySQL databases and perform queries"
    },
    {
      question: "How can you prevent Cross-Site Scripting (XSS) attacks in JavaScript?",
      choices: ["By validating and sanitizing user input", "By using encryption", "By disabling JavaScript", "By restricting access to the website"],
      correctAnswer: "By validating and sanitizing user input"
    },
    {
      question: "What is the purpose of the PHP 'namespace' keyword?",
      choices: ["To create a new variable", "To define a function", "To organize code into logical groups", "To include external libraries"],
      correctAnswer: "To organize code into logical groups"
    },
    {
      question: "In SQL, what is the difference between INNER JOIN and LEFT JOIN?",
      choices: ["INNER JOIN returns only matching rows, while LEFT JOIN returns all rows from the left table and matching rows from the right table.", "LEFT JOIN returns only matching rows, while INNER JOIN returns all rows from the left table and matching rows from the right table.", "INNER JOIN and LEFT JOIN are interchangeable terms.", "There is no difference between INNER JOIN and LEFT JOIN in SQL."],
      correctAnswer: "INNER JOIN returns only matching rows, while LEFT JOIN returns all rows from the left table and matching rows from the right table."
    },
    {
      question: "What is the purpose of the CSS 'box-shadow' property?",
      choices: ["To create a shadow effect around an element", "To set the background color of an element", "To define animation properties", "To specify the font shadow"],
      correctAnswer: "To create a shadow effect around an element"
    },
    {
      question: "In JavaScript, what is the 'event.stopPropagation()' method used for?",
      choices: ["To prevent the default behavior of an event", "To stop the event from bubbling up or propagating to parent elements", "To trigger an event manually", "To attach an event listener"],
      correctAnswer: "To stop the event from bubbling up or propagating to parent elements"
    },
    {
      question: "Which SQL statement is used to update data in a database?",
      choices: ["UPDATE", "MODIFY", "ALTER", "CHANGE"],
      correctAnswer: "UPDATE"
    },
  ],
];

  let currentQuestion = 0;
  let score = 0;

  // Get the user's pylevel from the PHP session
  // This assumes you have a PHP session variable named 'pylevel'
  let pylevel = <?php echo isset($_SESSION['pylevel']) ? $_SESSION['pylevel'] : 0; ?>;

  function loadQuestion() {
    const questionElement = document.getElementById('question');
    const choicesElement = document.getElementById('choices');

    
    // Load questions based on the current pylevel
    const currentQuestionSet = questionSets[pylevel];
    questionElement.textContent = currentQuestionSet[currentQuestion].question;

    choicesElement.innerHTML = "";
    for (let i = 0; i < currentQuestionSet[currentQuestion].choices.length; i++) {
      const choice = currentQuestionSet[currentQuestion].choices[i];
      choicesElement.innerHTML += `
        <label>
          <input type="radio" name="choice" value="${choice}" id="choice${i}">
          ${choice}
        </label>
      `;
    }

    updateProgressBar();
  }

  function submitAnswer() {
  const selectedChoice = document.querySelector('input[name="choice"]:checked');

  if (!selectedChoice) {
    alert("Please select an answer!");
    return;
  }

  const userAnswer = selectedChoice.value;
  const currentQuestionSet = questionSets[pylevel];
  const correctAnswer = currentQuestionSet[currentQuestion].correctAnswer;

  if (userAnswer === correctAnswer) {
    score++;
  }

  currentQuestion++;

  if (currentQuestion < currentQuestionSet.length) {
    loadQuestion();
  } else {
    // Move to the next pylevel if the user scores greater than 7/10
    if (score >= 7 && pylevel < questionSets.length - 1) {
      pylevel++; 
      const formData = new URLSearchParams();
      formData.append('value', pylevel);
      fetch('update_level.php', {
      method: 'POST',
      headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: formData,
      })
      .then(response => response.json())
      .then(data => {
      console.log(data);
      })
      .catch(error => {
      console.error('Error:', error);
      });
      alert(`Congratulations! You passed level ${pylevel + 1}. Moving to the next level.`);
      location.reload();
      loadQuestion();
     
      
    }
    else {
      showResult();
    }
  }
}


  function showResult() {
    const resultElement = document.getElementById('result');
    resultElement.textContent = `Your Score: ${score} out of ${questionSets[pylevel].length}`;
    
    // Check if all levels are passed
    if (pylevel === questionSets.length - 1) {
      alert("Congratulations! You have passed all levels. Your certificate is ready!");
      fetch('addcertificat.php', {
      method: 'POST',
      headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      },
      })
      .then(response => response.json())
      .then(data => {
      console.log(data);
      window.location.href = 'hh.php';
      })
      .catch(error => {
      console.error('Error:', error);
      });
    }
    
    // Reset the score for a new attempt
    score = 0;
  }

  function updateProgressBar() {
    const progressBarInner = document.getElementById('progress-bar-inner');
    const progress = ((currentQuestion + 1) / questionSets[pylevel].length) * 100;
    progressBarInner.style.width = `${progress}%`;
  }

 

  // Load the first question on page load
  loadQuestion();
</script>

</body>
</html>


