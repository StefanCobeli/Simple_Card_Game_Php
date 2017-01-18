/**
 * Created by Stefan on 1/18/2017.
 */
var playersDeck = [];
var evasDeck = [];
var permutation = [];
var leftPermutation = [];
var rightPermutation = [];
var cardSource = [];
var isPlayerMove = true;
var playerIsAheadWith = 0;
var playerWins = 0;
var evaWins = 0;
var moveNumber = 0;
var numberOfDraws = 0;
var executed = false;

function prepareGame(){
    if (executed){
        return;
    }
    else {
        for (i = 1; i <= 52; i++) {
            cardSource.push("svg-cards/" + i + ".svg");
            permutation.push(i);
        }
        shuffle(cardSource);
        leftPermutation = permutation.slice(0, 26);
        rightPermutation = permutation.slice(26, 52);
        playersDeck = cardSource.slice(0, 26);
        evasDeck = cardSource.slice(26, 52);
        executed = true;
        console.log(leftPermutation);
        console.log(playersDeck);
        console.log(rightPermutation);
        console.log(evasDeck);

    }
}

function makeMove(){
    if(moveNumber <= 25){
        document.getElementById("PlayersCard").src = playersDeck[moveNumber];
        document.getElementById("EvasCard").src = evasDeck[moveNumber];
        if (Math.floor(leftPermutation[moveNumber]/4) > Math.floor(rightPermutation[moveNumber]/4)){
            playerWins++;
        }
        else if (Math.floor(leftPermutation[moveNumber]/4) < Math.floor(rightPermutation[moveNumber]/4)){
            evaWins++;
        }
        else{
            numberOfDraws ++;
        }
        console.log(playerWins + " : " + evaWins);
        document.getElementById("Score").innerHTML = playerWins + " : " + evaWins;

        moveNumber++;
    }
    if (moveNumber == 26){
        alert("The winner is " + (evaWins > playerWins? "Eva!": "You!"));
        window.location = "GamePlay.php?Difference=" + (playerWins-evaWins);
    }
}
function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = permutation[currentIndex];
        permutation[currentIndex] = permutation[randomIndex];
        permutation[randomIndex] = temporaryValue;

        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}
prepareGame();