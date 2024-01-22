const questions = [{
        question: "Quel geste simple peut réduire la consommation d'eau à la maison ?",
        answers: [{
            text: "Prendre des douches plus longues",
            correct: false
        }, {
            text: "Laisser le robinet couler pendant le brossage des dents",
            correct: true
        }, {
            text: "Fermer le robinet lors du lavage des mains ",
            correct: false
        }]
    },
    {
        question: "Pour réduire la production de déchets, que pouvez-vous faire avec vos courses ?",
        answers: [{
            text: "Utiliser des sacs en plastique à usage unique ",
            correct: false
        }, {
            text: " Acheter des produits en suremballage ",
            correct: true
        }, {
            text: "Privilégier les produits en vrac et utiliser des sacs réutilisables ",
            correct: false
        }]

    },
    {
        question: "Quelle est une méthode écologique pour réduire l'utilisation de pesticides dans votre jardin",
        answers: [{
            text: "Arroser fréquemment avec des produits chimiques",
            correct: false
        }, {
            text: " Planter des espèces de plantes résistantes aux ravageurs",
            correct: true
        }, {
            text: "Utiliser des pesticides puissants pour une protection maximale",
            correct: false
        }]

    },
    {
        question: "Quel mode de transport contribue le plus à la réduction des émissions de gaz à effet de serre ?",
        answers: [{
            text: "Voiture individuelle",
            correct: false
        }, {
            text: "Vélo",
            correct: true
        }, {
            text: "Hélicoptère",
            correct: false
        }]
    },
    {
        question: "Comment pouvez-vous contribuer à la réduction de la pollution de l'air dans votre région ?",
        answers: [{
            text: "Brûler des déchets à l'extérieur",
            correct: false
        }, {
            text: "Utiliser les transports en commun ou le covoiturage",
            correct: true
        }, {
            text: "Conduire seul dans une voiture de sport",
            correct: false
        }]

    },
    {
        question: "Quel type de lumière est plus écoénergétique ?",
        answers: [{
            text: "Ampoules à incandescence",
            correct: false
        }, {
            text: "Ampoules fluorescentes compactes (CFL)",
            correct: true
        }, {
            text: "Ampoules à halogène",
            correct: false
        }]

    }
    // Ajoutez d'autres questions ici
];

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");
let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + "." + currentQuestion.question;
    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButtons.appendChild(button);
        if (answer.correct) {
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click", selectAnswer);

    });
}

function resetState() {
    nextButton.style.display = "none";
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";
    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++;
    } else {
        selectedBtn.classList.add("incorrect");
    }
    Array.from(answerButtons.children).forEach(button => {
        if (button.dataset.correct === "true") {
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    nextButton.style.display = "block";
}

function showScore() {
    resetState();
    if (score > 4) {
        questionElement.innerHTML = `Félicitations ! Vous avez obtenu un score de ${score} sur ${questions.length}!`;
    } else {
        questionElement.innerHTML = `Votre score est de ${score} sur ${questions.length}. Vous pouvez faire mieux !`;
    }

    nextButton.innerHTML = "REJOUER";
    nextButton.style.display = "block";
}


function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        showScore();

    }
}

nextButton.addEventListener("click", () => {
    if (currentQuestionIndex < questions.length) {
        handleNextButton();
    } else {
        startQuiz();
    }

});
startQuiz();