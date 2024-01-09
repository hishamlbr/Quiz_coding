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
        <h1>Welcome to <span style="font-weight: bold;">Python Quiz</span></h1>
        <p>Test your python knowledge !</p>
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
    // pylevel 1: Easy
    [
      {
        question: "What is the purpose of 'print' function in Python?",
        choices: ["Input data", "Display output", "Perform arithmetic", "Define a variable"],
        correctAnswer: "Display output"
      },
      {
        question: "Which keyword is used for defining a function in Python?",
        choices: ["func", "def", "define", "function"],
        correctAnswer: "def"
      },
      {
        question: "What is the result of the expression 5 + 3 * 2?",
        choices: ["16", "11", "26", "None of the above"],
        correctAnswer: "11"
      },
      {
        question: "Which data type is used to represent whole numbers in Python?",
        choices: ["float", "int", "char", "boolean"],
        correctAnswer: "int"
      },
      {
        question: "How do you comment a single line in Python?",
        choices: ["//", "#", "/* */", "--"],
        correctAnswer: "#"
      },
      {
        question: "What is the correct syntax for a 'while' loop in Python?",
        choices: ["while condition:", "do while condition:", "for condition in range:", "for condition:"],
        correctAnswer: "while condition:"
      },
      {
        question: "Which method is used to get the length of a list in Python?",
        choices: ["length()", "size()", "len()", "count()"],
        correctAnswer: "len()"
      },
      {
        question: "What does the 'else' keyword signify in an 'if-else' statement?",
        choices: ["It defines a block of code to be executed if the condition is true.", "It defines a block of code to be executed if the condition is false.", "It is not necessary in an 'if-else' statement.", "It repeats the 'if' condition."],
        correctAnswer: "It defines a block of code to be executed if the condition is false."
      },
      {
        question: "Which built-in function can be used to obtain the absolute value of a number in Python?",
        choices: ["abs()", "absolute()", "value()", "abs_value()"],
        correctAnswer: "abs()"
      },
      {
        question: "What does the 'import' keyword do in Python?",
        choices: ["Exports a module", "Imports a module", "Defines a module", "Removes a module"],
        correctAnswer: "Imports a module"
      },
    ],
    // pylevel 2: Intermediate
    [
      {
        question: "What is the purpose of the 'try' and 'except' blocks in Python?",
        choices: ["To define a function", "To handle exceptions", "To create a loop", "To import modules"],
        correctAnswer: "To handle exceptions"
      },
      {
        question: "In Python, what is the purpose of the 'yield' keyword in a function?",
        choices: ["To return a value from the function", "To pause the function and return a value to the caller", "To raise an exception", "To terminate the function"],
        correctAnswer: "To pause the function and return a value to the caller"
      },
      {
        question: "Which module is used for working with regular expressions in Python?",
        choices: ["regex", "re", "pyregex", "regexp"],
        correctAnswer: "re"
      },
      {
        question: "How do you open a file named 'example.txt' in Python for reading?",
        choices: ["file = open('example.txt', 'r')", "file = open('example.txt', 'w')", "file = read('example.txt')", "file = read_file('example.txt')"],
        correctAnswer: "file = open('example.txt', 'r')"
      },
      {
        question: "What is the purpose of the 'super()' function in Python?",
        choices: ["To call a superclass method", "To create an instance of a class", "To access class attributes", "To define a new class"],
        correctAnswer: "To call a superclass method"
      },
      {
        question: "How is exception handling done in Python?",
        choices: ["Using the 'finally' block", "Using the 'catch' block", "Using the 'exception' block", "Using the 'try' and 'except' blocks"],
        correctAnswer: "Using the 'try' and 'except' blocks"
      },
      {
        question: "What is the purpose of the 'global' keyword in Python?",
        choices: ["To define a global variable", "To declare a global function", "To access global modules", "To import global libraries"],
        correctAnswer: "To define a global variable"
      },
      {
        question: "In Python, what is the purpose of the 'pass' statement?",
        choices: ["To terminate a loop", "To raise an exception", "To do nothing", "To define a function"],
        correctAnswer: "To do nothing"
      },
      {
        question: "Which built-in function can be used to sort a list in ascending order in Python?",
        choices: ["sort()", "order()", "arrange()", "sorted()"],
        correctAnswer: "sorted()"
      },
      {
        question: "What is the purpose of the 'lambda' function in Python?",
        choices: ["To create anonymous functions", "To define global functions", "To import external functions", "To handle exceptions"],
        correctAnswer: "To create anonymous functions"
      },
    ],
    // pylevel 3: Advanced
  [
    {
      question: "What is the Global Interpreter Lock (GIL) in Python, and how does it impact multi-threading?",
      choices: ["It allows multiple threads to execute simultaneously.", "It prevents multiple threads from executing Python bytecodes at once.", "It is used for global variable locking.", "It is a tool for debugging multi-threaded programs."],
      correctAnswer: "It prevents multiple threads from executing Python bytecodes at once."
    },
    {
      question: "Explain the difference between 'deep copy' and 'shallow copy' in Python.",
      choices: ["Deep copy creates a new object with a new reference, while shallow copy creates a new object with the same reference.", "Shallow copy creates a new object with a new reference, while deep copy creates a new object with the same reference.", "Deep copy copies only the top-level elements, while shallow copy copies all nested elements.", "There is no difference between deep copy and shallow copy in Python."],
      correctAnswer: "Deep copy creates a new object with a new reference, while shallow copy creates a new object with the same reference."
    },
    {
      question: "What is a decorator in Python, and how is it used?",
      choices: ["It is a design pattern used to add new functionalities to an object dynamically.", "It is a way to comment code for better readability.", "It is a tool for defining global variables.", "It is a method for defining abstract classes."],
      correctAnswer: "It is a design pattern used to add new functionalities to an object dynamically."
    },
    {
      question: "Explain the concept of a generator in Python. Provide an example.",
      choices: ["Generators are functions that return an iterable set of items one at a time.", "Generators are used for file input and output operations.", "Generators are tools for memory management in Python.", "Generators are used to create random numbers in Python."],
      correctAnswer: "Generators are functions that return an iterable set of items one at a time."
    },
    {
      question: "What is the purpose of the 'with' statement in Python?",
      choices: ["It is used for bitwise operations.", "It is used for exception handling.", "It is used for context management.", "It is used for defining a new class."],
      correctAnswer: "It is used for context management."
    },
    {
      question: "Explain the concept of metaclasses in Python.",
      choices: ["Metaclasses are classes of classes.", "Metaclasses are used for mathematical operations.", "Metaclasses are used for file I/O operations.", "Metaclasses are tools for data visualization in Python."],
      correctAnswer: "Metaclasses are classes of classes."
    },
    {
      question: "What is the purpose of the '__init__' method in a Python class?",
      choices: ["It is called when an object is created from the class and is used to initialize the object's attributes.", "It is used for exception handling.", "It is called when an object is deleted from the class.", "It is used for defining global variables in a class."],
      correctAnswer: "It is called when an object is created from the class and is used to initialize the object's attributes."
    },
    {
      question: "Explain the concept of list comprehensions in Python. Provide an example.",
      choices: ["List comprehensions are a concise way to create lists.", "List comprehensions are used for sorting lists.", "List comprehensions are tools for data manipulation in Python.", "List comprehensions are used for file input and output operations."],
      correctAnswer: "List comprehensions are a concise way to create lists."
    },
    {
      question: "What is the purpose of the 'async' and 'await' keywords in Python?",
      choices: ["They are used for asynchronous programming and defining asynchronous functions.", "They are used for defining decorators.", "They are tools for handling exceptions in asynchronous code.", "They are used for creating context managers in asynchronous code."],
      correctAnswer: "They are used for asynchronous programming and defining asynchronous functions."
    },
    {
      question: "Explain the concept of a context manager in Python. Provide an example.",
      choices: ["Context managers are used for resource management, such as file handling.", "Context managers are used for defining decorators.", "Context managers are tools for data visualization in Python.", "Context managers are used for mathematical operations."],
      correctAnswer: "Context managers are used for resource management, such as file handling."
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
