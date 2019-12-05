<script type="text/javascript">

    document.onload = removeMember();

    function removeMember()
    {
        $(".remove-member").off('click').click(function(e){
            console.log("removeMember called");
            var id = $(this).attr('userId');

            $.ajax({
            type:'DELETE',
            url:'/members/'.concat(id),
            data:{},
            success:function(data){
                    console.log(data.message);
                    $('.team-member').load( window.location.pathname.concat(' .team-member'),
                        function(responseText, textStatus, XMLHttpRequest){
                            removeMember();
                    });
            } 
            });
        });
    }

</script>