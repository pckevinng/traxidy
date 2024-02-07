<template>
  <div>
    <h1>Add New Action</h1>
    <form @submit.prevent="addNewAction">     
      <div>
        <button type="submit">Add Action</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      formData: {
        creator_id: 3, // Remove default values
        project_id: 5,
        issue_id: 4,
        owner_contact_id: 7,
        owner_contact_name: 'John Doe',
        action_identifier: 'I2-A1',
        description: 'New action description',
        original_description: 'New action',
        due_date: '2022-02-28',
        decision_made: 1,
        status: 'open',
        progress: 50,
        gyr: 'yellow',
        created_at : '2022-02-28',
        updated_at : '2022-02-28',
      },
      error: null
    };
  },
  methods: {
    addNewAction() {
      axios.post('http://localhost:8000/api/actions', this.formData)
        .then(response => {
          console.log('Action added successfully:', response.data);
          // Optionally, reset form data or show a success message
        })
        .catch(error => {
          console.error('Error adding action:', error);
          this.error = error.message;
        });
    }
  }
}
</script>
