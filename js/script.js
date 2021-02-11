const guess = document.querySelector('input');
const btn = document.querySelector('.btn');
const msg = document.querySelector('.message');
const board = document.querySelector('.board');
const hint = document.querySelector('.hint');
let play = false;
let start = false
let randomWords;
let newWord;
let newHint;
let right = 0,
    wrong = 0;
let completedTime;
let ranNum = 0;
let words = [{
        hint: 'Social Media',
        word: 'instagram'
    }, {
        hint: 'Programming language',
        word: 'python'
    },
    {
        hint: 'Movie',
        word: 'titanic'
    },
    {
        hint: 'Football Legend',
        word: 'pele'
    },
    {
        hint: 'Fruit',
        word: 'pineapple'
    },
    {
        hint: 'Home',
        word: 'family'
    },
    {
        hint: 'Father of Computer',
        word: 'charles babbage'
    },
    {
        hint: 'Actor',
        word: 'johnny depp'
    },
    {
        hint: 'Programming Language',
        word: 'javascript'
    },
    {
        hint: 'Google',
        word: 'sunder pichai'
    }
];
const createNewWords = () => {
    newHint = words[ranNum].hint;
    newWord = words[ranNum].word;
    ranNum++;
}

function passvalue() {
    console.log("Working");
    const form = document.getElementById('scoreform');
    const score = document.getElementById('score');
    score.value = right;
    console.log(form);
    console.log(score);
    form.submit();
}

function finished() {
    passvalue();
    start = false;
    play = false;
    board.innerHTML = `Correct = ${right} || Wrong = ${wrong} || Timer = ${completedTime}`;
    guess.classList.toggle('hidden');
    btn.innerHTML = "Click here to start";
    msg.innerHTML = "";
    hint.innerHTML = '';
}

function completed() {
    passvalue();
    start = false;
    play = false;
    board.innerHTML = `Correct = ${right} || Wrong = ${wrong} || Timer = ${completedTime}`;
    btn.innerHTML = "Click here to start";
    msg.innerHTML = "";
    hint.innerHTML
}
const disorder = (a) => {
    for (let i = a.length - 1; i >= 0; i--) {
        let temp = a[i];
        let j = Math.floor(Math.random() * (i + 1));
        a[i] = a[j];
        a[j] = temp;
    }
    return a;
}

function startTimer() {
    let time = 0;
    let timer = setInterval(() => {
        if (wrong == 5 || time > 59) {
            completedTime = time;
            finished();
            clearInterval(timer);

        } else if (right == words.length) {
            completedTime = time;
            completed();
            clearInterval(timer);

        } else {
            board.innerHTML = `Correct = ${right} || Wrong = ${wrong} || Timer = ${time}`;
            time++;
        }
    }, 1000);
}
const gamePlay = () => {
    play = true;
    btn.innerHTML = "Guess";
    guess.classList.toggle('hidden');
    createNewWords();
    randomWords = disorder(newWord.split("")).join("");
    msg.innerHTML = `Guess the Word ${randomWords}`;
    hint.innerHTML = 'Hint: ' + newHint;
    guess.value = "";
}

btn.addEventListener('click', () => {
    if (!start) {
        start = true;
        right = 0;
        wrong = 0;
        startTimer();
        gamePlay();
    } else {
        if (!play) {
            gamePlay();
        } else {
            let tempWord = guess.value.toLowerCase();
            let checkword = newWord.toLowerCase();
            if (tempWord === checkword) {
                play = false;
                right++;
                msg.innerHTML = `Its correct... Its ${newWord}`;
                hint.innerHTML = '';
                guess.classList.toggle('hidden');
                btn.innerHTML = "Continue";
            } else {
                wrong++;
                msg.innerHTML = `Its incorrect ...Try Again ${randomWords}`;
                hint.innerHTML = 'Hint: ' + newHint;
                setTimeout(() => {
                    msg.innerHTML = `Guess the Word ${randomWords}`;
                }, 3000);
                btn.innerHTML = "Try again";
                guess.value = "";
            }
        }
    }

});