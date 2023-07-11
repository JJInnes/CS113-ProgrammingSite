var activeAnimations = [];

async function typingAnimation(itemID, endString){
    if(activeAnimations.includes(itemID)){
        return;
    }
    
    activeAnimations.push(itemID);
    const element = document.getElementById(itemID);
    var currentString = "";
    element.innerHTML = "";

    for(var i = 0; i < endString.length + 30; i++){
        if(i < endString.length){
            currentString += endString[i];
        }
        var displayString = currentString;

        if(i % 6 <= 3 && i != endString.length + 29){
            displayString += " _"
        }

        element.innerHTML = displayString.replace(/</g, '&lt;').replace(/>/g, '&gt;'); //Taken from https://stackoverflow.com/questions/47372291/escaping-the-greater-than-and-less-than-symbols-in-javascript
        await sleep(100);
    }

    activeAnimations.splice(activeAnimations.indexOf(itemID), 1);
}

async function sleep(time){
    await new Promise(x => setTimeout(x, time));
}