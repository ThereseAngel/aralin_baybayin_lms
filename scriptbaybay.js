//JS FOR TRANSLATION OF ENGLISH ALPHABET TO BAYBAYIN

function modernToBaybayin() {
    var inputText = document.getElementById("modernSpelling").value; inputText = inputText.toLowerCase();
    var outputText = "";
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    var vowel = { 'a': 'ᜀ', 'e': 'ᜁ', 'i': 'ᜁ', 'o': 'ᜂ', 'u': 'ᜂ' };
    var consonant = { 'b': 'ᜊ', 'k': 'ᜃ', 'd': 'ᜇ', 'f': 'ᜉ', 'g': 'ᜄ', 'h': 'ᜑ', 'l': 'ᜎ', 'm': 'ᜋ', 'n': 'ᜈ', 'p': 'ᜉ', 'r': 'ᜇ', 's': 'ᜐ', 't': 'ᜆ', 'v': 'ᜊ', 'w': 'ᜏ', 'y': 'ᜌ', 'z': 'ᜐ' }
    var supportedAll = true;

    for (var i = 0; i < inputText.length; i++) {
        var current = inputText.charAt(i);
        var next = inputText.charAt(i + 1);
        console.log(current);
        if (!(current in consonant) && !(current in vowel) && current !== ' ') {
            supportedAll = false;
        }
            if (current in vowel) {
                outputText += vowel[current];
            } else {
                if (current === 'n' && next === 'g') {
                    outputText += 'ᜅ'; /// ng
                    var nextChar = inputText.charAt(i + 2);
                    i += 1;
                    if (nextChar === 'a') {
                        // do nothing
                        i += 1;
                    } else if (nextChar === 'e' || nextChar === 'i') {
                        outputText += 'ᜒ';
                        i += 1;
                    } else if (nextChar === 'o' || nextChar === 'u') {
                        outputText += 'ᜓ';
                        i += 1;
                    } else { //consonant or space
                        outputText += '᜔';
                    }
                } else {
                    if (!(current in consonant)) {
                        outputText += current;
                    } else {
                        outputText += consonant[current];
                        if (next === 'a') {
                            // do nothing
                            i += 1;
                        } else if (next === 'e' || next === 'i') {
                            outputText += 'ᜒ';
                            i += 1;
                        } else if (next === 'o' || next === 'u') {
                            outputText += 'ᜓ';
                            i += 1;
                        } else { //consonant or space
                            outputText += '᜔';
                        }
                    }

                }


            }
        }
        var x = document.getElementById("unsupportedDiv");
        if (supportedAll) {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
        document.getElementById("baybay").value = outputText;
    }

function swap(json) {
    var ret = {};
    for (var key in json) {
        ret[json[key]] = key;
    }
    return ret;
}

function baybayinToModern() {
    var inputText = document.getElementById("baybay").value;
    var outputText = ""; inputText = inputText.toLowerCase();
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    var vowel = { 'a': 'ᜀ', 'e': 'ᜁ', 'i': 'ᜁ', 'o': '', 'u': 'ᜂ' }; vowel = swap(vowel);
    var consonant = { 'b': 'ᜊ', 'k': 'ᜃ', 'd': 'ᜇ', 'g': 'ᜄ', 'h': 'ᜑ', 'l': 'ᜎ', 'm': 'ᜋ', 'n': 'ᜈ', 'p': 'ᜉ', 's': 'ᜐ', 't': 'ᜆ', 'w': 'ᜏ', 'y': 'ᜌ', 'ng': 'ᜅ' } 
    consonant = swap(consonant);
    var supportedAll = true;
    for (var i = 0; i < inputText.length; i++) {
        var current = inputText.charAt(i);
        var next = inputText.charAt(i + 1);
        console.log(current);
        if (!(current in consonant) && !(current in vowel) && current !== ' ') {
            supportedAll = false;
        }
        if (current in vowel) {
            outputText += vowel[current];
        } else {
            if (!(current in consonant)) {
                console.log(current + 'ayy')
                outputText += current;
            } else {
                console.log(current + ' = ' + consonant[current])
                outputText += consonant[current];
                if (next === 'ᜒ') {
                    outputText += 'i';
                    i += 1;
                } else if (next === 'ᜓ') {
                    outputText += 'o';
                    i += 1;
                } else if (next === '᜔') { //consonant or space
                    outputText += '';
                    i += 1;
                } else {
                    outputText += 'a';
                }
            }
        }
    }
    var x = document.getElementById("unsupportedDiv");
    if (supportedAll) {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
    document.getElementById("modernSpelling").value = outputText;
}

function copyToClp(elementId) {
    /* Get the text field */
    var copyText = document.getElementById(elementId);
    /* Select the text field */
    copyText.select();
    /* Copy the text inside the text field */
    document.execCommand("copy");
} 
