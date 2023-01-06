var searchBox = document.getElementById('pac-input');

var amusementPark = document.getElementById('amusement-park');
var cafe = document.getElementById('cafe');
var dogrun = document.getElementById('dogrun');
var hospital = document.getElementById('hospital');
var ev = new KeyboardEvent('keydown', {
        altKey:false,               // check if Alt key is not pressed
        bubbles: true,              // this event is bubbled
        cancelBubble: false,        // not allow to stop bubbling
        cancelable: true,           // possible to cancel event
        charCode: 0,                // I don't know what this role is
        code: "Enter",              
        composed: true,
        ctrlKey: false,             // check if Ctrl key is not pressed
        currentTarget: null,
        defaultPrevented: true,     // default will be prevented
        detail: 0,
        eventPhase: 0,              // event phase is 0 that means event isn't happened
        isComposing: false,         // check if string is being composed
        isTrusted: true,            // check if the press is done by user
        key: "Enter",               // ev will be called when Enter key is pressed
        keyCode: 13,                // code of Enter key
        location: 0,                // what 0 means?
        metaKey: false,             // check if Macintosh key(= command key) isn't pressed
        repeat: false,              // don't repeat what?
        returnValue: false,
        shiftKey: false,
        type: "keydown",            // ev will be called at the moment when the key is pressed
        which: 13                   // what is which?? 13 seems to be a code of Enter key
    });

amusementPark.addEventListener('click', function()
{
                        //⬇️ "~" is a phrase that is put when you click on one of 4 categories buttons
    searchBox.value = "Japan's animal amusement park";
    // ⬇️ move to searchbox
    searchBox.focus();

    searchBox.dispatchEvent(ev);

});

cafe.addEventListener('click', function()
{
    searchBox.value = 'Animal Cafe';
    searchBox.focus();

    searchBox.dispatchEvent(ev);
});
dogrun.addEventListener('click', function()
{
    searchBox.value = 'Dog Run';
    searchBox.focus();

    searchBox.dispatchEvent(ev);
});
hospital.addEventListener('click', function()
{
    searchBox.value = 'Animal Hospital';
    searchBox.focus();

    searchBox.dispatchEvent(ev);
});