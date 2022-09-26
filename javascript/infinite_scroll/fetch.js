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
