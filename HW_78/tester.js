(function(){
    for (var x = 0; x < 10; x++) {
        app.counter.increment();
    }
    var counter1 = app.counterCreator.create();
    var counter2 = app.counterCreator.create();
    for (var y = 0; y < 5; y++) {
        counter1.increment();
    }
    for (var i = 0; i < 15; i++) {
        counter2.increment();
    }

    console.log("counter: ", app.counter.getCount());
    console.log("counter1: ", counter1.getCount());
    console.log("counter2: ", counter2.getCount());
}());