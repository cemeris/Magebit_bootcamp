import { Storage } from './Storage.js';
export class StorageTic extends Storage {
    getXCoords() {
        const data = this.getData();
        let x_coords = [];

        for (let id in data) {
            if (data[id] == 'x') {
                x_coords.push(id);
            }
        }
        return x_coords;
    }
}