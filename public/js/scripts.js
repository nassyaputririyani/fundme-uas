$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        margin: 20,
        dots: true,
        responsive: {
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
                loop:false
            }
        }
    });

    $('div[id^="card-promos"]').click((e) => {
        const id = e.currentTarget.attributes['data-id-project'].value;
        // const id = $('div#card-promos').attr('data-id-project');
        window.location.href = `/projects/${id}`;
    })

    let input = $('#amount-input')
    console.log(input)

    $('#select-amount-1').click(() => {
        input.val('100000')
        let pTag = $("#select-amount-1 p:first")
        let p2Tag = $("#select-amount-2 p:first")
        let p3Tag = $("#select-amount-3 p:first")
        if (pTag.hasClass('selected')) {
            pTag.removeClass('selected')
            input.prop('readonly', false)
        } else {
            pTag.addClass('selected')
            p2Tag.removeClass('selected')
            p3Tag.removeClass('selected')
            input.prop('readonly', true)
        }
    })

    $('#select-amount-2').click(() => {
        input.val('200000')
        let pTag = $("#select-amount-2 p:first")
        let p2Tag = $("#select-amount-1 p:first")
        let p3Tag = $("#select-amount-3 p:first")
        if (pTag.hasClass('selected')) {
            pTag.removeClass('selected')
            input.prop('readonly', false)
        } else {
            pTag.addClass('selected')
            p2Tag.removeClass('selected')
            p3Tag.removeClass('selected')
            input.prop('readonly', true)
        }
    })

    $('#select-amount-3').click(() => {
        input.val('500000')
        let pTag = $("#select-amount-3 p:first")
        let p2Tag = $("#select-amount-2 p:first")
        let p3Tag = $("#select-amount-1 p:first")
        if (pTag.hasClass('selected')) {
            pTag.removeClass('selected')
            input.prop('readonly', false)
        } else {
            pTag.addClass('selected')
            p2Tag.removeClass('selected')
            p3Tag.removeClass('selected')
            input.prop('readonly', true)
        }
    })


    $('#goals').click(() => {
        if ($('#list-goals').hasClass('d-none')) {
            $('#list-goals').removeClass('d-none')
        }

        if (!$('#list-business').hasClass('d-none')) {
            $('#list-business').addClass('d-none')
        }

        if (!$('#goals-text').hasClass('detail-choose')) {
            $('#goals-text').addClass('detail-choose')
        }

        if ($('#business-text').hasClass('detail-choose')) {
            $('#business-text').removeClass('detail-choose')
        }
    })

    $('#business-proposal').click(() => {
        if ($('#list-business').hasClass('d-none')) {
            $('#list-business').removeClass('d-none')
        }

        if (!$('#list-goals').hasClass('d-none')) {
            $('#list-goals').addClass('d-none')
        }

        if (!$('#business-text').hasClass('detail-choose')) {
            $('#business-text').addClass('detail-choose')
        }

        if ($('#goals-text').hasClass('detail-choose')) {
            $('#goals-text').removeClass('detail-choose')
        }
    })

   $('#list-business').click((e) => {
        var doc = new jsPDF()

        doc.text($('#title').text(), 50, 10)
        doc.text($('#short-description').text(), -30, 30)
        doc.text("Description", 14, 70)
        doc.text($('#long-description').text(), -30, 80)
        doc.save(`business-proposal_${$('#title').text()}.pdf`)
   })
});