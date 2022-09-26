import { StorageTic } from './StorageTic.js';

export class TicTacToe {
    constructor(storage_name, board_selector, reset_selector, message_el_selector) {
        this.storage = new StorageTic(storage_name);
        this.board = document.querySelector(board_selector);
        this.reset_btn = document.querySelector(reset_selector);
        this.message_element = document.querySelector(message_el_selector);

        this.#fillValues();
        /*
        4 % 2 = 0
        6 % 2 = 0
        20 % 2 = 0
        20 / 2 = 10 + 0/2

        5 % 3 == 2
        5 / 3 = 1 + 1/3

        7 % 5 = 2
        7 / 5 = 1 + 2/5

        4 % 5 = 4
        4 / 5 = 0 + 4/5
        */

        this.win_combinations = [
            [0, 1, 2],
            [3, 4, 5],
            [6, 7, 8],

            [0, 3, 6],
            [1, 4, 7],
            [2, 5, 8],

            [0, 4, 8],
            [2, 4, 6]
        ];

        this.board.onclick = (event) => {
            event.preventDefault();
            console.log(this.storage.getXCoords()); //TODO: remove this later
            if (event.target.tagName == 'DIV') return;
            let cell = event.target;
            if (cell.textContent != '') return;

            this.symbol = (this.storage.getCounter() % 2 == 0) ? 'x' : 'o';
            cell.textContent = this.symbol;
            this.storage.add(cell.dataset.id, this.symbol);
            let win_coord = this.#checkWinner();
            if (win_coord) {
                for (let coord of win_coord) {
                    this.board.children[coord].classList.add('win');
                }
                this.displayMessage('Winner is ' + this.symbol + '!');
            }
            // this.symbol = (this.symbol == 'x') ? 'o' : 'x';
        }

        this.reset_btn.onclick = (event) => {
            event.preventDefault();
            this.#resetHandler();
        };
    }

    #fillValues() {
        const all_moves = this.storage.getData();
        for (let id in all_moves) {
            this.board.children[id - 1].textContent = all_moves[id];
        }
    }

    #resetHandler() {
        this.storage.reset();
        for (let cell of this.board.children) {
            cell.textContent = '';
            this.symbol = 'x';
            this.displayMessage('');
        }

        for (let win_cell of this.board.querySelectorAll('.win')) {
            win_cell.classList.remove('win');
        }
    }

    #checkWinner() {
        for (let cords of this.win_combinations) {
            if (
                this.board.children[cords[0]].textContent == this.symbol &&
                this.board.children[cords[1]].textContent == this.symbol &&
                this.board.children[cords[2]].textContent == this.symbol
            ) {
                return [cords[0], cords[1], cords[2]];
            }
        }
        return false;
    }

    displayMessage(message) {
        this.message_element.textContent = message;
    }
}