var currentQuestion = 1;
var totalQuestions = 10; // Change this to the total number of questions
var correctAnswers = 0;

var questions = [
    {
        question: "What is the purpose of an internal stylesheet in web development?",
        options: [
            { id: "q1a", value: "a", label: "It allows for the addition of styles to HTML files without cluttering them." },
            { id: "q1b", value: "b", label: "It enables the dynamic modification of styles using JavaScript." },
            { id: "q1c", value: "c", label: "It provides a predefined set of styles for web pages." },
            { id: "q1d", value: "d", label: "It allows for the separation of HTML and CSS files." }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "Where should the code for internal styling be placed within an HTML file?",
        options: [
            { id: "q2a", value: "a", label: "Inside the <body> tag." },
            { id: "q2b", value: "b", label: "After the closing </html> tag." },
            { id: "q2c", value: "c", label: "Between the <head> and </head> tags." },
            { id: "q2d", value: "d", label: "Anywhere within the <body> tag." }
        ],
        answer: "c" // Correct answer for question
    },
    {
        question: "Which element acts as a container for the code that adds styles to an HTML file?",
        options: [
            { id: "q1a", value: "a", label: "<script>" },
            { id: "q1b", value: "b", label: "<div>" },
            { id: "q1c", value: "c", label: "<style>" },
            { id: "q1d", value: "d", label: "<link>" }
        ],
        answer: "c" // Correct answer for question
    },
    {
        question: "How can you apply a red color to all the paragraphs on a web page using internal styling?",
        options: [
            { id: "q1a", value: "a", label: "Target the paragraphs using a selector and set the color property to red." },
            { id: "q1b", value: "b", label: "Use a special class called p and assign it the color red." },
            { id: "q1c", value: "c", label: "Apply an inline style directly to each paragraph element." },
            { id: "q1d", value: "d", label: "Utilize an external CSS file to define the styles for paragraphs." }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "What advantage does internal styling offer in web development?",
        options: [
            { id: "q1a", value: "a", label: "It allows for the organization of styles within the HTML file." },
            { id: "q1b", value: "b", label: "It improves website performance through caching." },
            { id: "q1c", value: "c", label: "It provides access to a wide range of CSS frameworks and libraries." },
            { id: "q1d", value: "d", label: "It enables the customization of individual elements on a web page." }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "What is the purpose of using internal stylesheets in web development?",
        options: [
            { id: "q1a", value: "a", label: "To add colors, fonts, and styles to web pages." },
            { id: "q1b", value: "b", label: "To organize HTML code within the <style> tags." },
            { id: "q1c", value: "c", label: "To create a framework for web pages using HTML." },
            { id: "q1d", value: "d", label: "To dynamically modify styles using JavaScript." }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "Where should the <style> section be placed within an HTML file?",
        options: [
            { id: "q2a", value: "a", label: "Inside the <body> tag." },
            { id: "q2b", value: "b", label: "After the closing </html> tag." },
            { id: "q2c", value: "c", label: "Between the <head> and </head> tags." },
            { id: "q2d", value: "d", label: "Anywhere within the <body> tag." }
        ],
        answer: "c" // Correct answer for question
    },
    {
        question: "How can you change the color of all paragraphs on a web page using internal stylesheets?",
        options: [
            { id: "q1a", value: "a", label: "By targeting the <p> elements and specifying the color property." },
            { id: "q1b", value: "b", label: "By assigning a special class to each paragraph element." },
            { id: "q1c", value: "c", label: "By using an inline style attribute for each paragraph element." },
            { id: "q1d", value: "d", label: "By creating a separate CSS file and linking it to the HTML file." }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "What advantage does using internal stylesheets offer in web development?",
        options: [
            { id: "q1a", value: "a", label: "It allows for easy management and separation of styles from HTML." },
            { id: "q1b", value: "b", label: "It improves website performance through caching." },
            { id: "q1c", value: "c", label: "It provides access to a wide range of CSS frameworks and libraries." },
            { id: "q1d", value: "d", label: "It enables the customization of individual elements on a web page." }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "How can you target specific elements on a web page using internal stylesheets?",
        options: [
            { id: "q1a", value: "a", label: "By using their corresponding HTML tags." },
            { id: "q1b", value: "b", label: "By applying unique IDs to each element." },
            { id: "q1c", value: "c", label: "By using JavaScript functions for element targeting." },
            { id: "q1d", value: "d", label: "By using a special CSS selector for element targeting." }
        ],
        answer: "a" // Correct answer for question
    },
];

function showQuestion(questionNumber) {
    var questionElement = document.querySelector('.quiz main .question h2');
    var optionsElement = document.querySelector('.quiz main .options');

    var currentQuestionData = questions[questionNumber - 1];

    questionElement.textContent = "Question " + questionNumber + ": " + currentQuestionData.question;
    optionsElement.innerHTML = "";

    currentQuestionData.options.forEach(function (option) {
        var input = document.createElement("input");
        input.type = "radio";
        input.name = "q" + questionNumber;
        input.value = option.value;
        input.id = option.id;

        var label = document.createElement("label");
        label.htmlFor = option.id;
        label.textContent = option.label;

        var br = document.createElement("br");

        optionsElement.appendChild(input);
        optionsElement.appendChild(label);
        optionsElement.appendChild(br);
    });
}

function nextQuestion() {
    var selectedOption = document.querySelector('input[name="q' + currentQuestion + '"]:checked');
    if (selectedOption) {
        var userAnswer = selectedOption.value;
        var currentQuestionData = questions[currentQuestion - 1];
        if (userAnswer === currentQuestionData.answer) {
            correctAnswers++;
        }
        if (currentQuestion < totalQuestions) {
            currentQuestion++;
            showQuestion(currentQuestion);
        } else {
            showResults();
        }
    } else {
        alert("Please select an option");
    }
}

function showResults() {
    var mainElement = document.querySelector('.quiz main');
    mainElement.innerHTML = `
        <div class="results">
            <h2>Quiz Results</h2>
            <p>You have completed the quiz.</p>
            <p>You got: ${correctAnswers}/${totalQuestions}</p>
        </div>
    `;
}

// Initialize the quiz by showing the first question
showQuestion(currentQuestion);
