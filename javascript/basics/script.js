let example2 = document.querySelectorAll('.example2');
let number_value = document.querySelector('.number_value');

let obj = {
    key1: 3,
    key2: [
        'sss', {
            func1: function () {
                return this.func2;
            },
            func2: function () {
                return 'second success!';
            }
        }
    ],
    arr: [4]
};
let final_value = obj.key2[1].func1()();

output(final_value);

let arr = [3, '42', ['text', function () {
    return 'success';
}]];

arr[2][1]();

/*
    [] - obj, array
    . - obj
    () - execute function
*/

for (let i = 0; i < example2.length; i = i + 1) {
    example2[i].onclick = function (event) {
        let last_number = Number(number_value.textContent);
        if (last_number >= 100) {
            output('Number reached 100 or more, and we can`t change it anymore.');
        }
        else {
            number_value.textContent = last_number + Number(this.dataset.increment);
        }
    }
}