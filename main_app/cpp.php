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
        <h1>Welcome to <span style="font-weight: bold;">C++ Quiz</span></h1>
        <p>Test your C++ knowledge !</p>
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
const questionSets= [
    // cpplevel 1: Easy
    [
      {
        question: "What is the purpose of the 'cout' statement in C++?",
        choices: ["Accept input", "Display output", "Perform arithmetic", "Define a variable"],
        correctAnswer: "Display output"
      },
      {
        question: "Which keyword is used for defining a function in C++?",
        choices: ["func", "def", "define", "function"],
        correctAnswer: "void"
      },
      {
        question: "What is the result of the expression 5 + 3 * 2 in C++?",
        choices: ["16", "11", "26", "None of the above"],
        correctAnswer: "11"
      },
      {
        question: "Which data type is used to represent decimal numbers in C++?",
        choices: ["float", "int", "double", "char"],
        correctAnswer: "double"
      },
      {
        question: "How do you comment a single line in C++?",
        choices: ["//", "#", "/* */", "--"],
        correctAnswer: "//"
      },
      {
        question: "What is the correct syntax for a 'for' loop in C++?",
        choices: ["for condition:", "do while condition:", "for condition in range:", "for (initialization; condition; update)"],
        correctAnswer: "for (initialization; condition; update)"
      },
      {
        question: "Which header file is used for input and output operations in C++?",
        choices: ["iostream", "stdio.h", "fstream", "conio.h"],
        correctAnswer: "iostream"
      },
      {
        question: "What does the 'else' keyword signify in an 'if-else' statement in C++?",
        choices: ["It defines a block of code to be executed if the condition is true.", "It defines a block of code to be executed if the condition is false.", "It is not necessary in an 'if-else' statement.", "It repeats the 'if' condition."],
        correctAnswer: "It defines a block of code to be executed if the condition is false."
      },
      {
        question: "Which built-in function can be used to find the square root of a number in C++?",
        choices: ["sqrt()", "pow()", "squareRoot()", "root()"],
        correctAnswer: "sqrt()"
      },
      {
        question: "What does the 'include' directive do in C++?",
        choices: ["Exports a module", "Imports a module", "Defines a module", "Removes a module"],
        correctAnswer: "Imports a module"
      },
    ],
    // cpplevel 2: Intermediate
    [
      {
        question: "What is the purpose of the 'try' and 'catch' blocks in C++?",
        choices: ["To define a function", "To handle exceptions", "To create a loop", "To import modules"],
        correctAnswer: "To handle exceptions"
      },
      {
        question: "In C++, what is the purpose of the 'new' operator?",
        choices: ["To return a value from the function", "To dynamically allocate memory", "To raise an exception", "To terminate the function"],
        correctAnswer: "To dynamically allocate memory"
      },
      {
        question: "Which header file is used for regular expressions in C++?",
        choices: ["regex", "re", "pyregex", "regexp"],
        correctAnswer: "regex"
      },
      {
        question: "How do you open a file named 'example.txt' in C++ for writing?",
        choices: ["file = open('example.txt', 'r')", "file = open('example.txt', 'w')", "file = read('example.txt')", "file = read_file('example.txt')"],
        correctAnswer: "file = open('example.txt', 'w')"
      },
      {
        question: "What is the purpose of the 'typeid' operator in C++?",
        choices: ["To call a superclass method", "To create an instance of a class", "To access class attributes", "To get the type information of an expression"],
        correctAnswer: "To get the type information of an expression"
      },
      {
        question: "How is exception handling done in C++?",
        choices: ["Using the 'finally' block", "Using the 'catch' block", "Using the 'exception' block", "Using the 'try' and 'catch' blocks"],
        correctAnswer: "Using the 'try' and 'catch' blocks"
      },
      {
        question: "What is the purpose of the 'static' keyword in C++?",
        choices: ["To define a static variable", "To declare a static function", "To access static modules", "To import static libraries"],
        correctAnswer: "To define a static variable"
      },
      {
        question: "In C++, what is the purpose of the 'nullptr' keyword?",
        choices: ["To terminate a loop", "To indicate a null pointer", "To do nothing", "To define a function"],
        correctAnswer: "To indicate a null pointer"
      },
      {
        question: "Which standard template library (STL) container is used to implement a queue in C++?",
        choices: ["vector", "list", "queue", "deque"],
        correctAnswer: "queue"
      },
      {
        question: "What is the purpose of the 'auto' keyword in C++?",
        choices: ["To create anonymous functions", "To define global functions", "To import external functions", "To automatically deduce the data type"],
        correctAnswer: "To automatically deduce the data type"
      },
    ],
    // cpplevel 3: Advanced
    [
      {
        question: "What is RAII (Resource Acquisition Is Initialization) in C++?",
        choices: ["It allows multiple threads to execute simultaneously.", "It ensures resources are released automatically when an object goes out of scope.", "It is used for global variable locking.", "It is a tool for debugging multi-threaded programs."],
        correctAnswer: "It ensures resources are released automatically when an object goes out of scope."
      },
      {
        question: "Explain the concept of templates in C++. Provide an example.",
        choices: ["Templates are used for memory management.", "Templates are used for mathematical operations.", "Templates are used for file I/O operations.", "Templates are used for defining abstract classes."],
        correctAnswer: "Templates allow generic programming by defining functions and classes with generic types."
      },
      {
        question: "What is a functor in C++?",
        choices: ["It is a design pattern used to add new functionalities to an object dynamically.", "It is a way to comment code for better readability.", "It is a tool for defining global variables.", "It is a function object or callable object in C++."],
        correctAnswer: "It is a function object or callable object in C++."
      },
      {
        question: "Explain the concept of move semantics in C++.",
        choices: ["Move semantics involve transferring ownership of resources from one object to another.", "Move semantics are used for file input and output operations.", "Move semantics are tools for memory management in C++.", "Move semantics are used to create random numbers in C++."],
        correctAnswer: "Move semantics involve transferring ownership of resources from one object to another."
      },
      {
        question: "What is the purpose of the 'std::move' function in C++?",
        choices: ["It is used for bitwise operations.", "It is used for exception handling.", "It is used for context management.", "It is used to indicate that an object can be moved from."],
        correctAnswer: "It is used to indicate that an object can be moved from."
      },
      {
        question: "Explain the concept of the Rule of Three in C++.",
        choices: ["The Rule of Three involves three important methods: constructor, destructor, and copy assignment operator.", "The Rule of Three is used for sorting lists.", "The Rule of Three is tools for data manipulation in C++.", "The Rule of Three is used for file input and output operations."],
        correctAnswer: "The Rule of Three involves three important methods: constructor, destructor, and copy assignment operator."
      },
      {
        question: "What is the purpose of the 'constexpr' keyword in C++?",
        choices: ["It is called when an object is created from the class and is used to initialize the object's attributes.", "It is used for exception handling.", "It is called when an object is deleted from the class.", "It is used to indicate that a function or variable can be evaluated at compile time."],
        correctAnswer: "It is used to indicate that a function or variable can be evaluated at compile time."
      },
      {
        question: "Explain the concept of the 'std::unique_ptr' in C++.",
        choices: ["std::unique_ptr is used for resource management, such as file handling.", "std::unique_ptr is used for defining decorators.", "std::unique_ptr is tools for data visualization in C++.", "std::unique_ptr is used for mathematical operations."],
        correctAnswer: "std::unique_ptr is a smart pointer in C++ that owns and manages a dynamically allocated object."
      },
      {
        question: "What is the purpose of the 'decltype' keyword in C++?",
        choices: ["It is used for asynchronous programming and defining asynchronous functions.", "It is used for defining decorators.", "It is tools for handling exceptions in asynchronous code.", "It is used for deducing the type of an expression at compile time."],
        correctAnswer: "It is used for deducing the type of an expression at compile time."
      },
      {
        question: "Explain the concept of the 'std::thread' in C++.",
        choices: ["std::thread is used for resource management, such as file handling.", "std::thread is used for defining decorators.", "std::thread is tools for data visualization in C++.", "std::thread is used for creating and managing threads."],
        correctAnswer: "std::thread is used for creating and managing threads in C++."
      },
    ],
];


  let currentQuestion = 0;
  let score = 0;

  // Get the user's cpplevel from the PHP session
  // This assumes you have a PHP session variable named 'cpplevel'
  let cpplevel = <?php echo isset($_SESSION['cpplevel']) ? $_SESSION['cpplevel'] : 0; ?>;

  function loadQuestion() {
    const questionElement = document.getElementById('question');
    const choicesElement = document.getElementById('choices');

    
    // Load questions based on the current cpplevel
    const currentQuestionSet = questionSets[cpplevel];
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
  const currentQuestionSet = questionSets[cpplevel];
  const correctAnswer = currentQuestionSet[currentQuestion].correctAnswer;

  if (userAnswer === correctAnswer) {
    score++;
  }

  currentQuestion++;

  if (currentQuestion < currentQuestionSet.length) {
    loadQuestion();
  } else {
    // Move to the next cpplevel if the user scores greater than 7/10
    if (score >= 7 && cpplevel < questionSets.length - 1) {
      cpplevel++; 
      const formData = new URLSearchParams();
      formData.append('value', cpplevel);
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
      alert(`Congratulations! You passed level ${cpplevel + 1}. Moving to the next level.`);
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
    resultElement.textContent = `Your Score: ${score} out of ${questionSets[cpplevel].length}`;
    
    // Check if all levels are passed
    if (cpplevel === questionSets.length - 1) {
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
      window.location.href = 'completed.php';
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
    const progress = ((currentQuestion + 1) / questionSets[cpplevel].length) * 100;
    progressBarInner.style.width = `${progress}%`;
  }

 

  // Load the first question on page load
  loadQuestion();
</script>

</body>
</html>
