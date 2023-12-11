//Se crea la clase subjet el cual es la calse abstracta el cual podremos heredar
//Este va agregar a los observadores el cual le va notificar 
class Subject {
    constructor() {
        this.observers = [];
    }

    subscribe(obs) {
        this.observers.push(obs);
    }

    unsubscribe(obs) {
        this.observers = this.observers.filter(e => e !== obs);
    }

    notify(o) {
        this.observers.forEach(obs => {
            obs.notify(o);
        });
    }
}


//Se crea la clase para crear objetos heredando subjet
class ItemSubject extends Subject {
    constructor() {
        super();
        this.items = [];
    }

    notify(item) {
        this.items.push(item);
        super.notify(this);
    }
}


//se crea a los observadores creando una clase 
//Son ellos a los que notificaremos
class ListObserver {
    constructor(tag) {
        this.tag = tag;
    }

    notify(subject) {
        this.tag.innerHTML = "";
        subject.items.forEach(e => {
            let div = document.createElement("div");
            div.innerHTML = `<p>${e.description} <b>${e.amount}</b></p>`;
            this.tag.appendChild(div);
        });
    }
}


//Se crea otro observador para saber la cantidad de elementos
class DynamicObserver {
    constructor(tag, fn) {
        this.tag = tag;
        this.fn = fn;
    }

    notify(subject) {
        this.fn(subject, this.tag);
    }
}

let itemsSubject = new ItemSubject();
let listObserver = new ListObserver(document.getElementById("list"));
let dynamicObserver = new DynamicObserver(
    document.getElementById("spnCount"),
    (subject, tag) => {
        tag.innerHTML = subject.items.length;
    }
);

itemsSubject.subscribe(listObserver);
itemsSubject.subscribe(dynamicObserver);

//Se crea otro observador para notificar sino hay servicio

class SinServicioObserver {
    constructor(tag) {
        this.tag = tag;
    }

    notify(subject) {
        // Obtener los valores de las cajas de texto
        const campo1Valor = localStorage.getItem('campo1Valor') || '';
        const campo2Valor = localStorage.getItem('campo2Valor') || '';
        const campo3Valor = localStorage.getItem('campo3Valor') || '';
        const textoBuscado = 'sin servicio';

        // Verificar si alguno de los campos contiene "sin servicio"
        if (
            campo1Valor.toLowerCase().includes(textoBuscado) ||
            campo2Valor.toLowerCase().includes(textoBuscado) ||
            campo3Valor.toLowerCase().includes(textoBuscado)
        ) {
            this.tag.innerHTML = "Se ha ingresado 'sin servicio' en el formulario.";
        } else {
            this.tag.innerHTML = ""; // Limpiar el mensaje si no se encuentra
        }
    }
}

// Crear una instancia del nuevo observador
let sinServicioObserver = new SinServicioObserver(document.getElementById("sinServicioContainer"));

// Suscribir el nuevo observador al subject correspondiente
itemsSubject.subscribe(sinServicioObserver);