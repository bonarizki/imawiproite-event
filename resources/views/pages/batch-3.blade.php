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

    .slotwrapper ul {
        width: 75px !important;
        height:75px !important;
        font-size: 75px !important;
        line-height: 75px !important;
        text-align: center !important;
        border-radius: 20px;
    }

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
</style>
<div class="loader-count" hidden></div>
<section id="basic-horizontal-layouts" class="body-batch">
    <div class="row mt-2 mb-2">
        <div class="col-4"></div>
        <div class="col-4 d-flex justify-content-center">
            <h1>BATCH III</h1>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-4"></div>
        <div class="col-4 d-flex justify-content-center">
            <img src="{{asset('images/doorprize/dustmite.jpeg')}}" alt="Dust Mite Cleaner" width="200px" height="200px" class="image shadow">
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-4" id="total_winner"><h1>Total Winner : 0</h1></div>
        <div class="col-4 d-flex justify-content-center">
           <h1>Dust Mite Cleaner / 5 pcs</h1>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row" id="row-button" >
        <div class="col">
            <button type="button" class="btn btn-success btn-lg btn-block shadow-bottom" id="spin" onclick="spin()">START SPIN <i>(0/1)</i></button>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-4 d-flex justify-content-center">
        </div>
        <div class="col-4 d-flex justify-content-center">
        </div>
        <div class="col-4" hidden id="formInject">
            <input type="number" class="form-control" id="total_form" name="total_form" onkeyup="remakeInject(this)">
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
        const arrtempt = []; 
        var sound = new Audio("{{asset('ringtones/start.mp3')}}");
        var ding = new Audio("{{asset('ringtones/ding.wav')}}");
        var end = new Audio("{{asset('ringtones/end.mp3')}}");
        let total_spin = 0;
        let totalWinner = 0;

        $(document).ready(function () {
            createMachine();
            
        });

        selectWinner = () => {
            var arr = null;
            try {
                $.ajax({
                    async:false,
                    type:"get",
                    url:"{{route('getWinner')}}",
                    data:{
                        id_batch:"3"
                    },
                    success : (res) => {
                        arr = res.data.winner;
                    },
                    error : (res) => {
                        sound.pause();
                        $('.refresh-spin button').attr('hidden',false);
                        let message = res.responseJSON.message;
                        $('#formInject').attr('hidden',false);
                        sweetError(message)
                    }
                });
            } catch (error) {
                return error
            }

            return arr;
        }

        createMachine = (num_machine = 5) => {
            $('#spin').prop( "disabled", false );
            $('.master').remove();
            let machine = num_machine;
            let slot = 8;
            let str = `
                    <div class="row mb-1 master">
                    `;
            let x = 1
            for (let index = 0; index < machine ; index++) {
                str += `
                            <div class="col-5 d-flex justify-content-center">
                                <div class="slotwrapper" id="master-slot-${index}">
                                </div>
                            </div>
                            <div class="col-1 d-flex justify-content-center refresh-spin">
                                <button class="btn btn-block btn-info btn-lg" style="width:100%;height=100%;" hidden onclick="refreshSpin(${index})">
                                    <h4>
                                        <i class="fa fa-refresh spinner mr-1">
                                        </i>
                                    </h4>
                                </button>
                            </div>
                        `
                x++;
                if (x == 3) {
                    str += `
                    </div>
                    <div class="row master">
                        <div class="col-5 d-flex justify-content-center">
                            <h3 id="detail-master-slot-${index - 1 }" hidden><b></b></h3>
                        </div>
                        <div class="col-1 d-flex justify-content-center">
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <h3 id="detail-master-slot-${index}" hidden><b></b></h3>
                        </div>
                        <div class="col-1 d-flex justify-content-center">
                        </div>
                    </div>
                    <div class="row mb-1 master">`;
                    x = 1;
                }
            }
            str += `</div>
                    <div class="row master">
                        <div class="col-5 d-flex justify-content-center">
                            <h3 id="detail-master-slot-${num_machine - 1 }" hidden><b></b></h3>
                        </div>
                    </div>`;
            $(str).insertBefore( "#row-button" );
            createSlot(machine,slot);
        }

        createSlot = (machine,slot) => {
            for (let index = 0; index < machine; index++) {
                var list = '';
                for (let x = 0; x < slot; x++) {
                    list += `
                            <ul>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">1</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">2</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">3</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">4</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">5</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">6</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">7</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">8</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">9</li>
                                <li class="machine" style="background-color: ${randColor()}; color: white; padding-top:3px">0</li>
                            </ul>`                    
                }
                $(`#master-slot-${index}`).append(list);
            }
        }
        
        spin = () => {
            $('[id^=detail-master-slot-]').empty();
            total_spin = total_spin + 1;

            if (total_spin == 1 ) {
                $('#spin').prop( "disabled", true );
                // createMachine(4);
            }

            $('#spin i').text(`(${total_spin}/1)`);
            let data = $('[id^=master-slot-]');
            for (let index = 0; index < data.length; index++) {
                go(`master-slot-${index}`);
            }
        }

        remakeMachine = () => {
            
        }

        $('#btn-example1').click(function() {
            $('#example1 ul').playSpin();
        });

        go = (id) => {
           
            // Loop of playing sound
            sound.addEventListener('ended', function() {
                this.currentTime = 0;
                this.play();
            }, false);

            sound.play(); // Start play the sound after click button
            const winner = selectWinner();
            let duplicateWinner = winner.slice(0)
            $(`#${id} ul`).playSpin({
                loop:10,
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
                    totalWinner = totalWinner + 1;
                    $('#total_winner h1').text(`Total Winner : ${totalWinner}`);
                }
            });
        }

        getNameWinner = (id,winner) => {
            let nik = winner.toString();
            nik = nik.replace(/10/g,'0');
            nik = nik.replace(/,/g,'');
            $.ajax({
                type:"get",
                url:"{{url('detail-winner')}}/"+nik,
                success: (res) => {
                    let user = res.data
                    $(`#detail-${id}`).text(user.user_name+' - '+ user.user_nik);
                    $(`#detail-${id}`).attr('hidden',false);
                },
                error:()=> {
                    getNameWinner(id,winner);
                }
            })
        }

        randColor = () => {
            let result = color[Math.floor(Math.random() * color.length)];
            return result
        }

        randTime = () => {
            time = [900,1000,1150,1250]
            let result = time[Math.floor(Math.random() * time.length)];
            return result
        }
        
        randStopPosition = () => {
            stop = ['rightToLeft','leftToRight'];
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

        refreshSpin = (index) => {
            go(`master-slot-${index}`);
        }

        remakeInject = (data) => {
            createMachine(data.value);
        }
    </script>
@endsection