@extends('master/master')

@section('content')
<style>
    @font-face {
        font-family: "Spot-Italic";
        src: url("{{asset('font/BAHNSCHRIFT.ttf')}}");
    }
    .machine {
        font-family: "Spot-Italic";
    }

    .slotwrapper {
        overflow: hidden !important;
        display: inline-block !important;
        border: 1px solid #000 !important;
        height: 75px !important;
    }

    .slotwrapper ul {
        padding: 0 !important;
        margin: 0 !important;
        list-style: none !important;
        position: relative !important;
        float: left !important;
    }

    .slotwrapper ul  {
        width: 300px !important;
        height:75px !important;
        font-size: 40px !important;
        line-height: 75px !important;
        text-align: center !important;
        border-radius: 20px;
    }

    .slotwrapper-winner {
        overflow: hidden !important;
        display: inline-block !important;
        border: 1px solid #000 !important;
        height: 75px !important;
    }

    .slotwrapper-winner ul {
        padding: 0 !important;
        margin: 0 !important;
        list-style: none !important;
        position: relative !important;
        float: left !important;
    }

    .slotwrapper-winner ul {
        width: 60px !important;
        height:75px !important;
        font-size: 40px !important;
        line-height: 75px !important;
        text-align: center !important;
        border-radius: 20px;
    }

    /* .slotwrapper .machine-winner {
        width: 75px !important;
        height: 75px !important;
        font-size: 40px !important;
        line-height: 75px !important;
        text-align: center !important;
    } */

    .slotwrapper ul li img {
        vertical-align: top !important;
    }

    @media screen and (max-width: 1200px) {
        .slotwrapper {
            width: 100% !important;
        }

        .slotwrapper ul {
            width: 33% !important;
        }
    }

    @media screen and (max-width: 768px) {
        .slotwrapper {
            height: 100px !important;
        }

        .slotwrapper ul {
            height: 100px !important;
            font-size: 100px !important;
            line-height: 100px !important;
        }
    }

    /* Example 10 override slotwrapper */
    #example10 {
        height: 150px !important;
    }

    #example10 ul {
        width: 150px !important;
        height: 150px !important;
        font-size: 75px !important;
        line-height: 150px !important;
    }

    @media screen and (max-width: 1200px) {
        #example10 ul {
            width: 18% !important;
        }
    }

    @media screen and (max-width: 768px) {
        #example10 {
            height: 100px !important;
        }

        #example10 ul {
            height: 100px !important;
            font-size: 100px !important;
            line-height: 100px !important;
        }
    }
    .loader-count {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url({{ asset('images/count.gif') }}) center no-repeat rgba(255,255,255,0.6);
    }
</style>
<div class="loader-count" hidden></div>
<section id="basic-horizontal-layouts" class="body-batch">
    <div class="row mt-2">
        <div class="col-4 d-flex justify-content-center">
            <h1></h1>
        </div>
        <div class="col-4 d-flex justify-content-center">
           <h1><b><i>BATCH I</i></b></h1>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <h1></h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4 d-flex justify-content-center">
            <h1></h1>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <img src="{{asset('images/doorprize/Robot Vaccum.jpg')}}" alt="Robot Vaccum" width="200px" height="200px" class="image shadow ml-1">
            <img src="{{asset('images/doorprize/Smartphone.jpg')}}" alt="Smartphone" width="200px" height="200px" class="image shadow ml-1">
            <img src="{{asset('images/doorprize/TV 50 Inch.jfif')}}" alt="TV 50 Inch" width="200px" height="200px" class="image shadow ml-1">
        </div>
        <div class="col-4 d-flex justify-content-center">
            <h1></h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4 d-flex justify-content-center">
            <h1></h1>
        </div>
        <div class="col-4 d-flex justify-content-center">
           <h1><b><i>Selected Division</i></b></h1>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <h1></h1>
        </div>
    </div>
    <div class="row mt-2" id="depart-winner" hidden>
        <div class="col-4 d-flex justify-content-center">
            <h1 id="depart-winner-0" class="machine"></h1>
        </div>
        <div class="col-4 d-flex justify-content-center">
           <h1 id="depart-winner-1" class="machine"></h1>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <h1 id="depart-winner-2" class="machine"></h1>
        </div>
    </div>
    <div class="row" id="row-button">
        <div class="col">
            <button type="button" class="btn btn-success btn-lg btn-block" id="spin" onclick="spin('first')">START SPIN DEPARTMENT</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col" id="doorprize" hidden>
            <div class="row">
                <div class="col-5 d-flex justify-content-center">
                    <h1>Doorprize</h1>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <h1>Winner</h1>
                </div>
                <div class="col-1 d-flex justify-content-center">
                </div>
            </div>
            <div class="row">
                <div class="col-5 d-flex justify-content-center" id="machine-doorprize">
                </div>
                <div class="col-6 d-flex justify-content-center" id="machine-winner">
                </div>
                <div class="col-1 d-flex justify-content-center" id="refresher">
                </div>
            </div>
            <div class="row" id="row-button">
                <div class="col-6">
                    <button type="button" class="btn btn-success btn-lg btn-block" id="spin-dooprize" onclick="spinDoorPrize()">START SPIN  DOORPRIZE</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-success btn-lg btn-block" id="spin-winner" onclick="updateActual('kurang'),spinWinner()">START SPIN WINNER</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{asset('js/jslot/slotmachine.min.js')}}"></script>
    <script>
        
        const color = [
            '#000000','#999999','#ffd700'
        ]
        let department = [1,2,3,4,5,6,7,8]
        const doorprize = [1,2,3]; 
        let arr_doorprize = []; 
        var sound = new Audio("{{asset('ringtones/start.mp3')}}");
        var ding = new Audio("{{asset('ringtones/ding.wav')}}");
        var end = new Audio("{{asset('ringtones/end.mp3')}}");


        $(document).ready(function () {
            if (localStorage.getItem('dept_id') != null) {
                department = JSON.parse(localStorage.getItem('dept_id'));
                localStorage.setItem('tmp_dept',JSON.stringify(department));
                $('#row-button').attr('hidden',true)
                $('#doorprize').attr('hidden',false)
                createMachineDoorprize();
                createMachineWinner();
                getDepartmentName(department)
            }else{
                createMachine();
            }
        });

        createMachine = () => {
            let machine = 3;
            let slot = 1;
            let str = `
                    <div class="row mb-1">
                    `;
            let x = 1
            for (let index = 0; index < machine ; index++) {
                str += `
                            <div class="col-4 d-flex justify-content-center">
                                <div class="slotwrapper" id="master-slot-${index}">
                                </div>
                            </div>
                        `
                x++;
                if (x == 4) {
                    str += `
                    </div>
                    <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                            <h3 id="detail-master-slot-${index - 2 }" hidden><b></b><</h3>
                        </div>
                        <div class="col-4 d-flex justify-content-center">
                            <h3 id="detail-master-slot-${index - 1 }" hidden><b></b></h3>
                        </div>
                        <div class="col-4 d-flex justify-content-center">
                            <h3 id="detail-master-slot-${index}" hidden><b></b></h3>
                        </div>
                    </div>
                    <div class="row mb-1 ">`;
                    x = 1;
                }
            }
            str += '</div>'
            $(str).insertBefore( "#row-button" );
            createSlotDepartment(machine,slot);
        }

        createSlotDepartment = (machine,slot) => {
            for (let index = 0; index < machine; index++) {
                var list = '';
                for (let x = 0; x < slot; x++) {
                    list += `
                            <ul class="shadow">
                                <li class="machine" style="background-color: ${randColor()}; color: white;">F&A</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">HR & GA</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">IT</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">Manufacturing</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">Marketing</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">R & D</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">Sales</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">Skincare</li>
                            </ul>`                    
                }
                $(`#master-slot-${index}`).append(list);
            }
        }

        getDepartmentName = (dept_id) => {
            $.ajax({
                type:"get",
                data: {
                    id_department : dept_id,
                },
                url:"{{route('getDepartment')}}",
                success: (res) => {
                    $('#depart-winner').attr('hidden',false)
                    let data = res.data
                    for (let index = 0; index < data.length; index++) {
                        $(`#depart-winner-${index}`).text(data[index].department_name)
                    }
                }
            });
        }
        
        spin = (type) => {
            $('#spin').prop( "disabled", true );
            let data = $('[id^=master-slot-]');
            for (let index = 0; index < data.length; index++) {
                go(`master-slot-${index}`)
            }
            if(type == "first") updateActual('tambah') ;
        }

        go = (id) => {
            let sound = new Audio("{{asset('ringtones/start.mp3')}}");
            let ding = new Audio("{{asset('ringtones/ding.wav')}}");
            let end = new Audio("{{asset('ringtones/end.mp3')}}");
            // Loop of playing sound
            sound.addEventListener('ended', function() {
                this.currentTime = 0;
                this.play();
            }, false);

            sound.play(); // Start play the sound after click button
            $(`#${id} ul`).playSpin({
                loop:8,
                stopSeq: randStopPosition(),
                endNum : randDepartment(),
                easing: 'easeOutBack',
                time: randTime2(),
                onEnd: function() {
                    ding.play(); // Play ding after each number is stopped
                },
                onFinish: function() {
                    sound.pause(); // To stop the looping sound is pause it
                    end.play(); // To stop the looping sound is pause it
                }
            });
        }

        setLocalStorage = (id_department) => {
            if (localStorage.getItem('dept_id')) {
                let data = JSON.parse(localStorage.getItem('dept_id'));
                data.push(id_department);
                localStorage.setItem('dept_id',JSON.stringify(data));
            }else{
                localStorage.setItem('dept_id',JSON.stringify([id_department]));
            }
            // localStorage.setItem("dept_id",[id_department]);
        }

        randDepartment = () => {
            let result = department[Math.floor(Math.random() * department.length)];
            let index_dept = department.indexOf(result)
            department.splice(index_dept, 1);
            setLocalStorage(result);
            return result
        }

        randColor = () => {
            let result = color[Math.floor(Math.random() * color.length)];
            return result
        }

        randTime = () => {
            time = [3000,4500,6000]
            let result = time[Math.floor(Math.random() * time.length)];
            return result
        }

        randTime2 = () => {
            time = [3000,4500,6000]
            let result = time[Math.floor(Math.random() * time.length)];
            return result
        }
        
        randStopPosition = () => {
            stop = ['rightToLeft'];
            let result = stop[Math.floor(Math.random() * stop.length)];
            return result
        }

        sweetError = (message) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
            })
        }

        //SLOT MACHINE DOORPRIZE
        createMachineDoorprize = () => {
            let machine = 3;
            let slot = 1;
            let str = `
                    <div class="row mb-1">
                    `;
            let x = 1
            for (let index = 0; index < machine ; index++) {
                str += `
                            <div class="col-12 d-inline d-flex justify-content-center mb-2">
                                <div class="slotwrapper" id="master-doorprize-${index}">
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-center">
                                <h3 id="detail-master-doorprize-${index}" hidden>
                                <b></b></h3>
                            </div>
                        `
            }
            str += '</div>'
            $('#machine-doorprize').append(str)
            createSlotDoorPrize(machine,slot);
            
        }

        createSlotDoorPrize = (machine,slot) => {
            for (let index = 0; index < machine; index++) {
                var list = '';
                for (let x = 0; x < slot; x++) {
                    list += `
                            <ul class="shadow">
                                <li class="machine doorprize-slot" style="background-color: ${randColor()}; color: white;">DOORPRIZE</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">Android TV 50</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">Smartphone</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">Robot Vacuum</li>
                            </ul>`                    
                }
                $(`#master-doorprize-${index}`).append(list);
            }
        }

        spinDoorPrize = () => {
            $('.doorprize-slot').remove();
            arr_doorprize = doorprize.slice(0);
            let data = $('[id^=master-doorprize-]');
            for (let index = 0; index < data.length; index++) {
                goDoorPrize(`master-doorprize-${index}`)
            }
        }

        goDoorPrize = (id) => {
            // Loop of playing sound
            sound.addEventListener('ended', function() {
                this.currentTime = 0;
                this.play();
            }, false);

            sound.play(); // Start play the sound after click button
            $(`#${id} ul`).playSpin({
                loop:3,
                stopSeq: randStopPosition(),
                endNum : randDoorPrize(),
                easing: 'easeOutBack',
                time: randTime2(),
                onEnd: function() {
                    ding.play(); // Play ding after each number is stopped
                },
                onFinish: function() {
                    sound.pause(); // To stop the looping sound is pause it
                    end.play(); // To stop the looping sound is pause it
                    // getNameWinner(id,duplicateWinner);
                }
            });
        }

        randDoorPrize = () => {
            let result = arr_doorprize[Math.floor(Math.random() * arr_doorprize.length)];
            let index = arr_doorprize.indexOf(result)
            arr_doorprize.splice(index, 1);
            return (result)
        }

        //SLOT MACHINE WINNER
        createMachineWinner = () => {
            let machine = 3;
            let slot = 8;
            let str = `
                    <div class="row mb-1">
                    `;
            let x = 1
            for (let index = 0; index < machine ; index++) {
                str += `
                            <div class="col-12 d-flex justify-content-center mb-2">
                                <div class="slotwrapper-winner" id="master-winner-${index}">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <h3 id="detail-master-winner-${index}" hidden><b></b></h3>
                            </div>
                        `
            }
            str += '</div>';
            $('#machine-winner').append(str);
            createSlotWinner(machine,slot);
            createRefresher(machine,slot);
        }

        createRefresher = (machine,slot) => {
            let str = `
                    <div class="col">
                    `;
            for (let index = 0; index < machine ; index++) {
                str += `
                        <div class="col-12 mb-2">
                            <div class="row  refresh-spin">
                                <button class="btn btn-block btn-info btn-lg d-flex justify-content-center mt-3" style="width:100%;height=100%;" onclick="refreshSpin(${index})">
                                    <h4>
                                        <i class="fa fa-refresh spinner mr-1">
                                        </i>
                                    </h4>
                                </button>
                                <input type="text" id="nik-master-winner-${index}" hidden>
                            </div>
                        </div>
                    `
            }
            str += '</div>'
            $('#refresher').append(str);
        }

        refreshSpin = (index) => {
            let data = $(`#nik-master-winner-${index}`).val();
            if (data == '') {
                let dept_id = JSON.parse(localStorage.getItem('tmp_dept'));
                goWinner(`master-winner-${index}`,null,dept_id);
            }else{
                let nik = data.split(',');
                goWinner(`master-winner-${index}`,nik);
            }
        }

        createSlotWinner = (machine,slot) => {
            for (let index = 0; index < machine; index++) {
                var list = '';
                for (let x = 0; x < slot; x++) {
                    list += `
                            <ul>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">1</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">2</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">3</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">4</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">5</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">6</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">7</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">8</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">9</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white;">0</li>
                            </ul>`                    
                }
                $(`#master-winner-${index}`).append(list);
            }
        }

        spinWinner = () => {
            arr_doorprize = doorprize.slice(0);
            let data = $('[id^=master-doorprize-]');
            for (let index = 0; index < data.length; index++) {
                goWinner(`master-winner-${index}`)
            }
        }

        goWinner = (id, nik = null, dept_id = null) => {
            // Loop of playing sound
            sound.addEventListener('ended', function() {
                this.currentTime = 0;
                this.play();
            }, false);

            sound.play(); // Start play the sound after click button
            let winner = '' 
            if (nik != null) {
                winner = winnerByDepartment(nik);
            }else if(dept_id != null){
                winner = getWinnerRefresh(dept_id);
            }else{
                winner = selectWinner();
            }
            
            let duplicateWinner = winner.slice(0)
            $(`#${id} ul`).playSpin({
                loop:3,
                stopSeq: randStopPosition(),
                endNum : winner,
                easing: 'easeOutBack',
                time: randTime(),
                onEnd: function() {
                    ding.play(); // Play ding after each number is stopped
                },
                onFinish: function() {
                    sound.pause(); // To stop the looping sound is pause it
                    end.play(); // To stop the looping sound is pause it
                    getNameWinner(id,duplicateWinner);
                    $(`#nik-${id}`).val(duplicateWinner);
                    $('.refresh-spin').attr('hidden',false)
                }
            });
        }

        getWinnerRefresh = (dept_id) => {
            let user_nik = ''
            $.ajax({
                async : false,
                type:"get",
                url:"{{route('refresh-winner')}}",
                data: {
                    id_batch : "1",
                    id_department : dept_id
                },
                success : (res) => {
                    user_nik = res.data.winner;
                },
                error:()=> {
                    getWinnerRefresh(dept_id)
                }
            })
            return user_nik;
        }

        winnerByDepartment = (nik) => {
            let user_nik = ''
            $.ajax({
                async : false,
                type:"get",
                url : "{{route('winner-department')}}",
                data : {
                    user_nik : nik,
                    id_batch : "1",
                },
                success : (res) => {
                    user_nik = res.data.winner;
                }
            })
            return user_nik;
        }

        updateActual = (type) => {
            $.ajax({
                type:"get",
                url:"{{route('update-actual')}}",
                data: {
                    type : type,
                    id_department : JSON.parse(localStorage.getItem('dept_id'))
                },
                success : (res) => {
                    console.log(res)
                }
            })
        }

        selectWinner = () => {
            var arr = null;
            try {
                $.ajax({
                    async:false,
                    type:"get",
                    url:"{{route('getWinner')}}",
                    data:{
                        id_batch:"1",
                        id_department : JSON.parse(localStorage.getItem('dept_id'))
                    },
                    success : (res) => {
                        arr = res.data.winner;
                    },
                    error : (res) => {
                        sound.pause();
                        $('.refresh-spin').attr('hidden',false);
                        $('.loader-count').attr('hidden',true);
                        let message = res.responseJSON.message;
                        sweetError(message)
                    }
                }).done(function() {
                    $('.loader-count').attr('hidden',true);
                });
            } catch (error) {
                return error
            }
            return arr;
        }

        getNameWinner = (id,winner) => {
            let nik = winner.toString();
            nik = nik.replace(/10/g,'0');
            nik = nik.replace(/,/g,'');
            $.ajax({
                type:"get",
                url:"{{url('detail-winner')}}/"+nik,
                success: (res) => {
                    UnsetTempArr(res.data);
                    let user = res.data
                    $(`#detail-${id}`).text(user.user_name+' - '+ user.department.department_name);
                    $(`#detail-${id}`).attr('hidden',false);
                }
            })
        }

        UnsetTempArr = (data) => {
            let temp_arr = JSON.parse(localStorage.getItem('tmp_dept'));
            let arr = [];
            let dept_id = data.department_id;
            for (let index = 0; index < temp_arr.length; index++) {
                if (temp_arr[index] != dept_id) {
                    arr.push(temp_arr[index]);
                }                
            }
            localStorage.setItem('tmp_dept',JSON.stringify(arr));
        }
    </script>
@endsection