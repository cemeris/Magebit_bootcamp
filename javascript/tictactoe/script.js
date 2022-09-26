import { TicTacToe } from './TicTacToe.js';
import { nextNumber, previousNumber } from './helper.js';

let tic_tac_toe_one = new TicTacToe(
    'tic_tac_toe_game_first',
    '.first_game .board',
    '.first_game .reset',
    '.first_game .message'
);

tic_tac_toe_one.displayMessage("Let's start a game!");

let tic_tac_toe_second = new TicTacToe(
    'tic_tac_toe_game_second',
    '.second_game .board',
    '.second_game .reset',
    '.second_game .message'
);

// console.log(nextNumber(7));
// console.log(previousNumber(11));

// localStorage.setItem('tic_tac_toe_game', JSON.stringify(data));

