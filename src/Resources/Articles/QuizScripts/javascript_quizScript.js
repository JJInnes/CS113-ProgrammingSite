var currentQuestion = 1;
var totalQuestions = 10; // Change this to the total number of questions
var correctAnswers = 0;

var questions = [
    {
        question: "What is the purpose of javascript?",
        options: [
            { id: "q1a", value: "a", label: "a) To add interactivity and dynamic content" },
            { id: "q1b", value: "b", label: "b) To style content." },
            { id: "q1c", value: "c", label: "c) To structure content." }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "What is the % operator?",
        options: [
            { id: "q2a", value: "a", label: "a) Divide" },
            { id: "q2b", value: "b", label: "b) Not null" },
            { id: "q2c", value: "c", label: "c) Modulo" }
        ],
        answer: "c" // Correct answer for question
    },
    {
        question: "Why might you use a for loop over a while loop.",
        options: [
            { id: "q1a", value: "a", label: "a) It's faster." },
            { id: "q1b", value: "b", label: "b) To know the number of the current iteration." },
            { id: "q1c", value: "c", label: "c) To reduce the code complexity." }
        ],
        answer: "b" // Correct answer for question
    }
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
