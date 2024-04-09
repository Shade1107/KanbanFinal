function KdeleteMember(memberId) {
    // console.log("hello");
    jQuery.ajax({
        url: '../pages/delete_memberlist.php',
        type: 'GET',
        data: { id: memberId },
        success: function(response) {
            // Optionally, you can handle success response
            console.log('Member deleted successfully');
            $('#' + memberId).modal('hide');
            $('.modal-backdrop').remove();
            // Remove the list item corresponding to the deleted member
            $('#listItem_' + memberId).remove();
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error deleting member:', error);
        }
    });
  
   
  }