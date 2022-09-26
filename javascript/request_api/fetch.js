async function fetchAPI(url, callback) {
    console.log('request has been send');

    //const response = await fetch(url, { method: 'POST', body: data });
    const response = await fetch(url);
    const response_json = await response.json();
    console.log(response_json);
    if (response.status == 200) {
        callback(response_json);
    }
}

console.log('A');
document.querySelector('.fetch_btn').onclick = function () {
    console.log('C');
    fetchAPI('https:\/\/dog.ceo/api/breeds/image/random', function (response) {
        addImg(response.message);
    });
    console.log('D');
};
console.log('B');
