var quest = [
    {
        question: "1. He was an HONEST man",
        options: ["A) liar", "B) good", "C) bad", "D) truthful", "E) wonderful"],
        answer: "D" 
    },
    {
        question: "2. The climate of Great Britain is MILD",
        options: ["A) difficult", "B) strong", "C) severe", "D) bad", "E) good"],
        answer: "E"
    },
    {
        question: "3. She was afraid to walk FARTHER as she knew her life was in danger.",
        options: ["A) mother", "B) out near", "C) near", "D) nearer", "E) away"],
        answer: "E"
    },
    {
        question: "4. If you know one FOREIGN language it will be easier for you to learn the second one.",
        options: ["A) local", "B) modern", "C) popular", "D) old", "E) native"],
        answer: "E" 
    },
    {
        question: "5. Tom’s father was a CRUEL man.",
        options: ["A) honest", "B) kind", "C) funny", "D) serious", "E) light"],
        answer: "B"
    },
    {
        question: "6. It seemed to her that he was very DECENT.",
        options: ["A) dishonest", "B) be tired of", "C) fat", "D) handsome", "E) unhealthy"],
        answer: "A"
    },
    {
        question: "7. I opened the door and saw a DECEASED man.",
        options: ["A) weak", "B) sick", "C) invisible", "D) new born", "E) old"],
        answer: "D"
    },
    {
        question: "8. Tom is very LAZY. He doesn’t like to do anything.",
        options: ["A) modest", "B) modern", "C) clever", "D) energetic", "E) nervous"],
        answer: "D"
    },
    {
        question: "9. My sister is very SERIOUS.",
        options: ["A) energetic", "B) polite", "C) kind", "D) intelligent", "E) light-minded"],
        answer: "E"
    },
    { 
        question: "10. Mr. Brown decided TO PROTECT that young man.",
        options: ["A) to help", "B) to accuse", "C) to care", "D) to shout", "E) to criticize"],
        answer: "B"
    }
];


var questionIndex = 0;
var puncte = 0;


function displayQuest() {
        var currentQuestion = quest[questionIndex];
        document.getElementById("question").innerText = currentQuestion.question;
        for (var i = 0; i < currentQuestion.options.length; i++) {
            document.getElementById("option" + (i + 1)).innerText = currentQuestion.options[i];
        }
}


function nextQuestion() {
    questionIndex++;
    if(questionIndex < quest.length) {
        var nextQuestion = quest[questionIndex];
        document.getElementById("question").innerText = nextQuestion.question;
        for(var i = 0; i < nextQuestion.options.length; i++){
            document.getElementById("option" + (i + 1)).innerText = nextQuestion.options[i];
        }
    } else {
        document.getElementById("question").innerText = "Quiz completat!";
    }
}


function checkAnswer(userAnswer) {
    var currentQuestion = quest[questionIndex];
    if (userAnswer === currentQuestion.answer) {
        alert("Raspuns corect");
        puncte++;

        currentQuestion = currentQuestion + 1;
        nextQuestion();
    } else {
        alert("Raspuns gresit");
    }
    //currentQuestion = currentQuestion + 1;
    //nextQuestion();
}  



displayQuest();