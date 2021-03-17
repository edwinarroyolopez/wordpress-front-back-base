const __ = jQuery

__(document).on('ready', () => {
    console.log('Dom loaded...');

    __('#btnCreateEvent').on('click', () => {
        console.log('You done click here!');

        let hostName = __('#hostName').val();
        let email = __('#email').val();
        let phone = __('#phone').val();
        let eventName = __('#eventName').val();
        let eventDescription = __('#eventDescription').val();
        let eventCity = __('#eventCity').val();
        let eventPlace = __('#eventPlace').val();
        let eventDate = __('#eventDate').val();
        let eventHour = __('#eventHour').val();

        console.log('hostName:', hostName)
        console.log('email:', email)
        console.log('phone:', phone)
        console.log('eventName:', eventName)
        console.log('eventDescription:', eventDescription)
        console.log('eventCity:', eventCity)
        console.log('eventPlace:', eventPlace)
        console.log('eventDate:', eventDate)
        console.log('eventHour:', eventHour)

        __.post('https://sitio.com/wp-admin/admin-ajax.php', {
           action: 'create_event',
           data: {
            hostname:hostName,
            email:email,
            phone:phone,
            event_name:eventName,
            event_description:eventDescription,
            event_city:eventCity,
            event_place:eventPlace,
            event_date:eventDate,
            event_hour:eventHour,
           },
        }, function(r) {
            console.log('result: ', r);
        });
    })

})