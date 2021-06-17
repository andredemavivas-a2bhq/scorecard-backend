<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var token = $('input[name="_token"]').val();

    $('.view-btn').each(function() {
        $(this).on('click', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('scorecards.view') }}",
                method: "POST",
                data: {
                    id,
                    _token: token
                },
                success: function(data){
                    var items = JSON.parse(data.tasks);
                    for(let i = 0; i < items.title.length; i++){
                        $('#scorecardBody').append(`
                            <tr>
                                <td>${items.title[i]}</td>
                                <td>${items.priority[i]}</td>
                                <td>${items.duedate[i]}</td>
                                <td>${items.techlvl[i]}</td>
                                <td>${items.completion[i]}</td>
                                <td>${convertedSeconds(items.estimatedhr[i])}</td>
                                <td>${convertedSeconds(items.actualtime[i])}</td>
                            </tr>
                        `);
                    }

                    for(let i = 0; i < items.startBreaks.length; i++){
                        if(items.startBreaks[i] != null){
                            $('#breakBody').append(`
                                <tr>
                                    <td>${items.startBreaks[i]}</td>
                                    <td>${items.endBreaks[i]}</td>
                                    <td>${items.totalBreaks[i]}</td>
                                </tr>
                            `);
                        }
                    }
                    
                    for(let i = 0; i < items.projects.length; i++){
                        if(items.projects[i] != null){
                            $('#projectBody').append(`
                                <tr>
                                    <td>${items.projects[i]}</td>
                                    <td>${items.projCount[i]}</td>
                                </tr>
                            `);
                        }
                    }
                    
                    $('#breakBody').append(`
                        <tr class='bg-secondary text-white'>
                            <td>Total</td>
                            <td>&nbsp;</td>
                            <td>${items.totalHrsBreak}</td>
                        </tr>
                    `);
                    
                }
            });
        });
    });

    $('#closeModal').on('click', function(){
        $('#scorecardBody').empty();
        $('#breakBody').empty();
        $('#projectBody').empty();
    });
    
    function convertedSeconds(time){
        return new Date(time * 1000).toISOString().substr(11, 8);
    }
</script>


