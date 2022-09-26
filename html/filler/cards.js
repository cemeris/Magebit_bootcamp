{
    const head = document.querySelector('head');
    const body = document.querySelector('body');
    const css_link = document.createElement('link');
    css_link.setAttribute('href', "/html/filler/cards.css");
    css_link.setAttribute('rel', "stylesheet");

    head.append(css_link)



    function includeHTML(callback = null) {
        var z, i, elmnt, file, xhttp;
        /* Loop through a collection of all HTML elements: */
        z = document.getElementsByTagName("*");
        for (i = 0; i < z.length; i++) {
            elmnt = z[i];
            /*search for elements with a certain atrribute:*/
            file = elmnt.getAttribute("include-html");
            if (file) {
                /* Make an HTTP request using the attribute value as the file name: */
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            if (callback == null) {
                                elmnt.innerHTML = this.responseText;
                            }
                            else {
                                callback.bind(elmnt)(this.responseText);
                            }

                        }
                        if (this.status == 404) { elmnt.innerHTML = "Page not found."; }
                        /* Remove the attribute, and call this function once more: */
                        elmnt.removeAttribute("include-html");
                        includeHTML();
                    }
                }
                xhttp.open("GET", file, true);
                xhttp.send();
                /* Exit the function: */
                return;
            }
        }
    }

    const images = [
        'https://images.unsplash.com/photo-1646928226184-15aedf273626?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1646928984876-cdef3a1dc500?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1646928229117-08e84cde1692?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80',
        'https://images.unsplash.com/photo-1650968491722-6642f485e02b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80',
    ];
    let counter = 0;
    function getImageUrl() {
        if (counter >= images.length) {
            counter = 0;
        }

        return images[counter++];
    }

    includeHTML(function (text) {
        let template = document.createElement('template');
        template.innerHTML = text;
        body.append(template);
        for (let times = 20; times > 0; times--) {
            const clone = template.content.cloneNode(true);
            clone.querySelector('img').src = getImageUrl();
            this.append(clone);
        }
    });
}
