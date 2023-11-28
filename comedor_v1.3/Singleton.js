function SingletonFoo() {

    let fooInstance = null;
 
 // Para nuestra referencia, creemos un contador que rastreará el número de instancias activas
 
 let count = 0;
 
    function printCount() {
        console.log("Number of instances: " + count);
    }
 
    function init() {
 // Para nuestra referencia, aumentaremos el recuento en uno cada vez que se llame a init()
 count++;
 
        // Inicializamos aquí el objeto que consume muchos recursos y lo devolvemos
        return {}
    }
 
    function createInstance() {
        if (fooInstance == null) {
            fooInstance = init();
        }
        return fooInstance;
    }
 
    function closeInstance() {
        count--;
        fooInstance = null;
    }
 
    return {
        initialize: createInstance,
        close: closeInstance,
        printCount: printCount
    }
 }
 
 let foo = SingletonFoo();
 
 foo.printCount() // Prints 0
 foo.initialize()
 foo.printCount() // Prints 1
 foo.initialize()
 foo.printCount() // Still prints 1
 foo.initialize()
 foo.printCount() // Still 1
 foo.close()
 foo.printCount() // Prints 0