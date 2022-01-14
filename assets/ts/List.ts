// @ts-ignore
import {ButtonList, createElementA, createInput} from "./ButtonList.ts";

export class List {

    constructor(public parent : HTMLElement, public id : string, public timeProject: string, public timeTodo: string) {}

    // View all todo
    public view(name: string, id: string) {
        let container = document.createElement("div") as HTMLDivElement;
        container.className = "width_100 flexRow list";
        this.parent.append(container);

        let listName = document.createElement("p") as HTMLParagraphElement;
        listName.className = "width_90";
        listName.innerHTML = name;
        container.append(listName);

        const buttonList: ButtonList = new ButtonList(container, "");
        buttonList.chrono("chrono" + this.id, container, "time" + id, this.timeProject, this.timeTodo, id, this.id);

        let line = document.createElement("div") as HTMLDivElement;
        line.className = "lineHorizontal";
        this.parent.append(line);
    }

    // View all todo to one project
    public viewListProjectId(name: string, id: string, date: string, time: string, idProject: string) {
        let container = document.createElement("div") as HTMLDivElement;
        container.className = "width_100 flexRow list";
        this.parent.append(container);

        let listName = document.createElement("p") as HTMLParagraphElement;
        listName.className = "width_90";
        listName.innerHTML = name;
        container.append(listName);

        let div = document.createElement("div") as HTMLDivElement;
        div.className = "width_10 center widthList";
        div.id = "date" + id;
        container.append(div);

        let para = document.createElement("p") as HTMLParagraphElement;
        para.id = "datePara" + id;
        para.innerHTML = "<i class='far fa-calendar-alt'> " + date;
        div.append(para);

        let idDate = para.id;
        let clickDate = document.getElementById(idDate) as HTMLDivElement;

        // When you click on the date you can modify the date, to save you press ok
        clickDate.addEventListener("click", function () {
            clickDate.innerHTML = "";

            let form = document.createElement("form") as HTMLFormElement;
            form.method = "POST";
            form.action = "";
            form.id = "formDate";
            div.append(form);

            createInput(form, date, "dateTodo", "text", "inputDateTodo" + id);

            let button = document.createElement("button") as HTMLButtonElement;
            button.type = "submit";
            button.name = "send";
            button.innerHTML = "Ok";
            button.id = "sendDate" + id;
            form.append(button);

            let buttonDate = document.getElementById(button.id) as HTMLButtonElement;

            buttonDate.addEventListener("click", function () {
                let valueInput = document.getElementById("inputDateTodo" + id) as HTMLInputElement;
                let xhr: XMLHttpRequest = new XMLHttpRequest();

                let data = {
                    'id': id,
                    'date': valueInput.value,
                    'idProject': idProject,
                }

                xhr.open('PUT', './../api/todo');
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(JSON.stringify(data));
            });
        });

        let div2 = document.createElement("div") as HTMLDivElement;
        div2.className = "width_10 center widthList";
        div2.id = "time" + id;
        container.append(div2);

        let para2 = document.createElement("p") as HTMLParagraphElement;
        para2.id = "TimePara" + id;
        para2.innerHTML = "<i class='fas fa-stopwatch'> " + time;
        div2.append(para2);

        let idTime = para2.id;
        let clickTime = document.getElementById(idTime) as HTMLDivElement;

        // When you click on the time you can modify the time, to save you press ok
        clickTime.addEventListener("click", function () {
            clickTime.innerHTML = "";

            let form = document.createElement("form") as HTMLFormElement;
            form.method = "POST";
            form.action = "";
            form.id = "formTime2";
            div2.append(form);

            createInput(form, time, "timeTodo", "text", "inputTimeTodo" + id);
            createInput(form, time, "timeTodo2", "hidden", "inputTimeTodoActual" + id);

            let button = document.createElement("button") as HTMLButtonElement;
            button.type = "submit";
            button.name = "send";
            button.innerHTML = "Ok";
            button.id = "sendTime" + id;
            form.append(button);

            let buttonTime = document.getElementById(button.id) as HTMLButtonElement;

            let tableSeconds: number[] = [];
            let tableMinutes: number[] = [];
            let tableHours: number[] = [];

            buttonTime.addEventListener("click", function () {
                let valueInput = document.getElementById("inputTimeTodo" + id) as HTMLInputElement;

                let xhr2: XMLHttpRequest = new XMLHttpRequest();
                xhr2.onload = function () {
                    let response: string = xhr2.responseText;
                    let json2: any = JSON.parse(response);

                    let seconds: number = parseInt(valueInput.value.slice(6, 8));
                    tableSeconds.push(seconds);

                    let minutes: number = parseInt(valueInput.value.slice(3, 5));
                    tableMinutes.push(minutes);

                    let hours: number = parseInt(valueInput.value.slice(0, 3));
                    tableHours.push(hours);

                    // display a list of a project
                    for (let x = 0; x < json2.length; x++) {
                        if (json2[x].project_fk == idProject && json2[x].id != id) {
                            let seconds: number = parseInt(json2[x].time.slice(6, 8));
                            tableSeconds.push(seconds);

                            let minutes: number = parseInt(json2[x].time.slice(3, 5));
                            tableMinutes.push(minutes);

                            let hours: number = parseInt(json2[x].time.slice(0, 3));
                            tableHours.push(hours);

                            // Calculate the sum of all digits in the table
                            let sumSeconds = tableSeconds.reduce(function (accumulator,currentValue) {return accumulator + currentValue; });
                            let sumMinutes = tableMinutes.reduce(function (accumulator,currentValue) {return accumulator + currentValue; });
                            let sumHours = tableHours.reduce(function (accumulator,currentValue) {return accumulator + currentValue; });

                            let xhr: XMLHttpRequest = new XMLHttpRequest();
                            let data = {
                                'id': id,
                                'time': valueInput.value,
                                'idProject': idProject,
                            }
                            xhr.open('PUT', './../api/todo');
                            xhr.setRequestHeader('Content-Type', 'application/json');
                            xhr.send(JSON.stringify(data));

                            let xhr3: XMLHttpRequest = new XMLHttpRequest();

                            let data3 = {
                                'id': idProject,
                                'time': sumHours + ":" + sumMinutes + ":" + sumSeconds
                            };

                            xhr3.open('PUT', './../api/project');
                            xhr3.setRequestHeader('Content-Type', 'application/json');
                            xhr3.send(JSON.stringify(data3));
                            break;
                        }
                    else {
                            let xhr: XMLHttpRequest = new XMLHttpRequest();
                            let data = {
                                'id': id,
                                'time': valueInput.value,
                                'idProject': idProject,
                            }
                            xhr.open('PUT', './../api/todo');
                            xhr.setRequestHeader('Content-Type', 'application/json');
                            xhr.send(JSON.stringify(data));

                            let xhr3: XMLHttpRequest = new XMLHttpRequest();

                            let data3 = {
                                'id': idProject,
                                'time': valueInput.value
                            };

                            xhr3.open('PUT', './../api/project');
                            xhr3.setRequestHeader('Content-Type', 'application/json');
                            xhr3.send(JSON.stringify(data3));
                        }
                    }
                }
                xhr2.open('GET', './../api/todo');
                xhr2.send();
            });
        });

        const buttonList: ButtonList = new ButtonList(container, id, idProject);
        buttonList.edit();
        buttonList.delete();

        let line = document.createElement("div") as HTMLDivElement;
        line.className = "lineHorizontal";
        this.parent.append(line);
    }
}