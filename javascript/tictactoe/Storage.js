export class Storage {
    #db = {
        'counter': 0,
        'data': {}
    };
    constructor(name) {
        this.storage_name = name;
        const temp_data = localStorage.getItem(name);
        if (temp_data != null) {
            this.#db = JSON.parse(temp_data);
        }
    }

    reset() {
        this.#db = {
            'counter': 0,
            'data': {}
        };
        this.save();
    }

    getData() {
        return this.#db.data;
    }

    getCounter() {
        return this.#db.counter;
    }

    add(id, value) {
        this.#db.counter++;
        this.#db.data[id] = value;
        this.save();
    }

    save() {
        localStorage.setItem(this.storage_name, JSON.stringify(this.#db));
    }
}