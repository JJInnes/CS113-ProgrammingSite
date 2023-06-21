var currentQuestion = 1;
var totalQuestions = 10; // Change this to the total number of questions
var correctAnswers = 0;

var questions = [
    {
        question: "This is question one",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question two",
        options: [
            { id: "q2a", value: "a", label: "a) 1" },
            { id: "q2b", value: "b", label: "b) 2" },
            { id: "q2c", value: "c", label: "c) 3" },
            { id: "q2d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question three",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question four",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question five",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question six",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question seven",
        options: [
            { id: "q2a", value: "a", label: "a) 1" },
            { id: "q2b", value: "b", label: "b) 2" },
            { id: "q2c", value: "c", label: "c) 3" },
            { id: "q2d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question eight",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question nine",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
    {
        question: "This is question ten",
        options: [
            { id: "q1a", value: "a", label: "a) 1" },
            { id: "q1b", value: "b", label: "b) 2" },
            { id: "q1c", value: "c", label: "c) 3" },
            { id: "q1d", value: "d", label: "d) 4" }
        ],
        answer: "a" // Correct answer for question
    },
];

function showQuestion(questionNumber) {
    var questionElement = document.querySelector('.quiz main .question h5');
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
