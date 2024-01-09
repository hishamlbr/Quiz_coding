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
        <h1>Welcome to <span style="font-weight: bold;">Java Quiz</span></h1>
        <p>Test your Java knowledge !</p>
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
    // Java Level 1: Easy
  [
    {
      question: "What is the purpose of 'System.out.println()' in Java?",
      choices: ["Accept input", "Display output", "Perform arithmetic", "Define a variable"],
      correctAnswer: "Display output"
    },
    {
      question: "Which keyword is used for defining a method in Java?",
      choices: ["func", "def", "define", "void"],
      correctAnswer: "void"
    },
    {
      question: "What is the result of the expression 5 + 3 * 2 in Java?",
      choices: ["16", "11", "26", "None of the above"],
      correctAnswer: "11"
    },
    {
      question: "Which data type is used to represent whole numbers in Java?",
      choices: ["float", "int", "char", "boolean"],
      correctAnswer: "int"
    },
    {
      question: "How do you comment a single line in Java?",
      choices: ["//", "#", "/* */", "--"],
      correctAnswer: "//"
    },
    {
      question: "What is the correct syntax for a 'while' loop in Java?",
      choices: ["while condition:", "do while condition:", "for condition in range:", "for condition:"],
      correctAnswer: "while condition:"
    },
    {
      question: "Which method is used to get the length of a list in Java?",
      choices: ["length()", "size()", "len()", "count()"],
      correctAnswer: "size()"
    },
    {
      question: "What does the 'else' keyword signify in an 'if-else' statement in Java?",
      choices: ["It defines a block of code to be executed if the condition is true.", "It defines a block of code to be executed if the condition is false.", "It is not necessary in an 'if-else' statement.", "It repeats the 'if' condition."],
      correctAnswer: "It defines a block of code to be executed if the condition is false."
    },
    {
      question: "Which built-in function can be used to obtain the absolute value of a number in Java?",
      choices: ["abs()", "absolute()", "value()", "abs_value()"],
      correctAnswer: "Math.abs()"
    },
    {
      question: "What does the 'import' keyword do in Java?",
      choices: ["Exports a module", "Imports a module", "Defines a module", "Removes a module"],
      correctAnswer: "Imports a module"
    },
  ],

  // Java Level 2: Intermediate
  [
    {
      question: "What is the purpose of the 'try' and 'catch' blocks in Java?",
      choices: ["To define a function", "To handle exceptions", "To create a loop", "To import modules"],
      correctAnswer: "To handle exceptions"
    },
    {
      question: "In Java, what is the purpose of the 'yield' keyword in a function?",
      choices: ["To return a value from the function", "To pause the function and return a value to the caller", "To raise an exception", "To terminate the function"],
      correctAnswer: "To pause the function and return a value to the caller"
    },
    {
      question: "Which module is used for working with regular expressions in Java?",
      choices: ["regex", "re", "pyregex", "regexp"],
      correctAnswer: "java.util.regex"
    },
    {
      question: "How do you open a file named 'example.txt' in Java for reading?",
      choices: ["file = open('example.txt', 'r')", "file = open('example.txt', 'w')", "file = read('example.txt')", "file = read_file('example.txt')"],
      correctAnswer: "FileReader file = new FileReader('example.txt')"
    },
    {
      question: "What is the purpose of the 'super()' function in Java?",
      choices: ["To call a superclass method", "To create an instance of a class", "To access class attributes", "To define a new class"],
      correctAnswer: "To call a superclass method"
    },
    {
      question: "How is exception handling done in Java?",
      choices: ["Using the 'finally' block", "Using the 'catch' block", "Using the 'exception' block", "Using the 'try' and 'except' blocks"],
      correctAnswer: "Using the 'try' and 'catch' blocks"
    },
    {
      question: "What is the purpose of the 'global' keyword in Java?",
      choices: ["To define a global variable", "To declare a global function", "To access global modules", "To import global libraries"],
      correctAnswer: "There is no 'global' keyword in Java"
    },
    {
      question: "In Java, what is the purpose of the 'pass' statement?",
      choices: ["To terminate a loop", "To raise an exception", "To do nothing", "To define a function"],
      correctAnswer: "There is no 'pass' statement in Java"
    },
    {
      question: "Which built-in function can be used to sort a list in ascending order in Java?",
      choices: ["sort()", "order()", "arrange()", "Collections.sort()"],
      correctAnswer: "Collections.sort()"
    },
    {
      question: "What is the purpose of the 'lambda' function in Java?",
      choices: ["To create anonymous functions", "To define global functions", "To import external functions", "To handle exceptions"],
      correctAnswer: "(parameters) -> { /* body of the lambda function */ }"
    },
  ],

  // Java Level 3: Advanced
  [
    {
      question: "What is the purpose of the 'Thread.sleep()' method in Java?",
      choices: ["It allows multiple threads to execute simultaneously.", "It pauses the execution of the current thread.", "It is used for global variable locking.", "It is a tool for debugging multi-threaded programs."],
      correctAnswer: "It pauses the execution of the current thread."
    },
    {
      question: "Explain the concept of 'Java Garbage Collection'.",
      choices: ["It ensures resources are released automatically when an object goes out of scope.", "It is used for sorting lists.", "It is a tool for defining global variables.", "It is responsible for automatically freeing up memory occupied by objects that are no longer reachable."],
      correctAnswer: "It is responsible for automatically freeing up memory occupied by objects that are no longer reachable."
    },
    {
      question: "What is a 'Java Interface'?",
      choices: ["It is a design pattern used to add new functionalities to an object dynamically.", "It is a way to comment code for better readability.", "It is a tool for defining global variables.", "It is a collection of abstract methods. Classes can implement interfaces."],
      correctAnswer: "It is a collection of abstract methods. Classes can implement interfaces."
    },
    {
      question: "Explain the concept of 'Java Streams'.",
      choices: ["Java Streams are used for resource management, such as file handling.", "Java Streams are used for defining decorators.", "Java Streams are tools for data visualization in Java.", "Java Streams are a sequence of elements supporting parallel and aggregate operations."],
      correctAnswer: "Java Streams are a sequence of elements supporting parallel and aggregate operations."
    },
    {
      question: "What is the purpose of the 'try-with-resources' statement in Java?",
      choices: ["It is used for bitwise operations.", "It is used for exception handling.", "It is used for context management.", "It is used to automatically close resources like files."],
      correctAnswer: "It is used to automatically close resources like files."
    },
    {
      question: "Explain the concept of 'Java Annotations'.",
      choices: ["Java Annotations are used for resource management, such as file handling.", "Java Annotations are used for defining decorators.", "Java Annotations are tools for data visualization in Java.", "Java Annotations provide metadata about the code."],
      correctAnswer: "Java Annotations provide metadata about the code."
    },
    {
      question: "What is the purpose of the 'Object.clone()' method in Java?",
      choices: ["It is called when an object is created from the class and is used to initialize the object's attributes.", "It is used for exception handling.", "It creates a shallow copy of the object.", "It is used for defining global variables in a class."],
      correctAnswer: "It creates a shallow copy of the object."
    },
    {
      question: "Explain the concept of 'Java Generics'. Provide an example.",
      choices: ["Java Generics are a concise way to create lists.", "Java Generics are used for sorting lists.", "Java Generics are tools for data manipulation in Java.", "Java Generics allow you to create classes, interfaces, and methods with type parameters."],
      correctAnswer: "Java Generics allow you to create classes, interfaces, and methods with type parameters."
    },
    {
      question: "What is the purpose of the 'volatile' keyword in Java?",
      choices: ["It is used for asynchronous programming and defining asynchronous functions.", "It is used for defining decorators.", "It is tools for handling exceptions in asynchronous code.", "It indicates that a variable's value may be changed by multiple threads simultaneously."],
      correctAnswer: "It indicates that a variable's value may be changed by multiple threads simultaneously."
    },
    {
      question: "Explain the concept of 'Java Reflection'.",
      choices: ["Java Reflection is used for resource management, such as file handling.", "Java Reflection is used for defining decorators.", "Java Reflection is tools for data visualization in Java.", "Java Reflection allows programmatic access to information about the fields, methods, and constructors of loaded classes."],
      correctAnswer: "Java Reflection allows programmatic access to information about the fields, methods, and constructors of loaded classes."
    },
  ],
];

  let currentQuestion = 0;
  let score = 0;

  // Get the user's javalevel from the PHP session
  // This assumes you have a PHP session variable named 'javalevel'
  let javalevel = <?php echo isset($_SESSION['javalevel']) ? $_SESSION['javalevel'] : 0; ?>;

  function loadQuestion() {
    const questionElement = document.getElementById('question');
    const choicesElement = document.getElementById('choices');

    
    // Load questions based on the current javalevel
    const currentQuestionSet = questionSets[javalevel];
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
  const currentQuestionSet = questionSets[javalevel];
  const correctAnswer = currentQuestionSet[currentQuestion].correctAnswer;

  if (userAnswer === correctAnswer) {
    score++;
  }

  currentQuestion++;

  if (currentQuestion < currentQuestionSet.length) {
    loadQuestion();
  } else {
    // Move to the next javalevel if the user scores greater than 7/10
    if (score >= 7 && javalevel < questionSets.length - 1) {
      javalevel++; 
      const formData = new URLSearchParams();
      formData.append('value', javalevel);
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
      alert(`Congratulations! You passed level ${javalevel + 1}. Moving to the next level.`);
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
    resultElement.textContent = `Your Score: ${score} out of ${questionSets[javalevel].length}`;
    
    // Check if all levels are passed
    if (javalevel === questionSets.length - 1) {
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
    const progress = ((currentQuestion + 1) / questionSets[javalevel].length) * 100;
    progressBarInner.style.width = `${progress}%`;
  }

 

  // Load the first question on page load
  loadQuestion();
</script>

</body>
</html>
