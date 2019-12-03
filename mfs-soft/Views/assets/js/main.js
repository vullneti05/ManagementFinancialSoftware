$("#menu-toggle").click(function (e)
{
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


// Slider

$('.carousel').carousel(
{
    interval: 3000
});

// Pagesa Print

function yesno(label)
{
    alert("Test");
    document.getElementById(label).innerHTML = chk.checked ? "Me Print" : "Pa Print";

    console.log(chk, label);
}


$(document).ready(function ()
{
    $(".custom-navigation button").click(function ()
    {
        $(".custom-navigation .list-group .custom-remove").remove();
    });
});

// Active Sidebar

$("#sidebar-wrapper .sidebar-link").each(function ()
{
    if ((window.location.pathname.indexOf($(this).attr('href'))) > -1)
    {
        $(this).addClass('sidebar-active');
    }
});

// Fletore

function posta()
{
    $("#pagesa").css('display', 'none');
    $("#trick").css('display', 'block');
}

function borgji()
{
    $("#borgj").css('display', 'none');
    $("#trick1").css('display', 'block');
}

function keshi()
{
    $("#keshi").css('display', 'none');
    $("#trick2").css('display', 'block');
}




// Chart 1
var ctx = document.getElementById('pikatChart').getContext('2d');
var myChart = new Chart(ctx,
{
    type: 'pie',
    data:
    {
        labels: ['Pika 1', 'Pika 2', 'Pika 3', 'Pika 4'],
        datasets: [
        {
            label: '# of Votes',
            data: [20, 19, 5, 22],
            backgroundColor: [
                'rgb(34, 130, 165)',
                'rgb(255, 255, 255)',
                'rgb(27, 129, 15)',
                'rgb(195, 65, 65)',
                'rgb(27, 129, 15)',
            ],
            borderColor: [
                'rgb(34, 130, 165)',
                'rgb(54, 162, 235)',
                'rgb(27, 129, 15)',
                'rgb(195, 65, 65)',
                'rgb(27, 129, 15)',
            ],
            borderWidth: 1
        }]
    },
    options:
    {

    }
});

// Chart 2
var ctx = document.getElementById('pikatChart1').getContext('2d');
var myChart = new Chart(ctx,
{
    type: 'pie',
    data:
    {
        labels: ['Pika 1', 'Pika 2', 'Pika 3', 'Pika 4'],
        datasets: [
        {
            label: '# of Votes',
            data: [20, 19, 5, 22],
            backgroundColor: [
                'rgb(34, 130, 165)',
                'rgb(255, 255, 255)',
                'rgb(27, 129, 15)',
                'rgb(195, 65, 65)',
                'rgb(27, 129, 15)',
            ],
            borderColor: [
                'rgb(34, 130, 165)',
                'rgb(54, 162, 235)',
                'rgb(27, 129, 15)',
                'rgb(195, 65, 65)',
                'rgb(27, 129, 15)',
            ],
            borderWidth: 1
        }]
    },
    options:
    {

    }
});




function test()
{
    alert("test");
}