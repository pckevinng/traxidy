<template>
  <div>
    <h1>List of Actions</h1>
    <ul v-if="actions.length > 0">
      <li v-for="action in actions" :key="action.id">
        {{ action.id }} - {{ action.owner_contact_name }}
      </li>
    </ul>
    <p v-else>No actions found</p>

    <div>
      <h1>Add New Action</h1>
      <form @submit.prevent="addNewAction">     
        <div>
          <button type="submit">Add Action</button>
        </div>
      </form>
    </div>

    <div>
      <h1>delete Actions</h1>
      <input type="number" v-model="actionIdToDelete" placeholder="Enter Action ID">
      <button @click="deleteAction(actionIdToDelete)">Delete</button>
    </div>

    <div>
    <h1>Update Owner Contact Name</h1>
    <div>
      <label for="id">ID:</label>
      <input type="number" id="id" v-model="id" required>
    </div>
    <div>
      <label for="newOwnerName">New Owner Contact Name:</label>
      <input type="text" id="newOwnerName" v-model="newOwnerName" required>
    </div>
    <div>
      <button @click="updateOwnerContact">Update Owner Contact</button>
    </div>

  
  </div>


  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      actions: [],
      actionIdToDelete: null,
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
  mounted() {
    this.fetchActions();
  },
  methods: {
    fetchActions() {
      axios.get('http://localhost:8000/api/actions')
        .then(response => {
          this.actions = response.data;
        })
        .catch(error => {
          console.error('Error fetching actions:', error);
          this.error = error.message;
        });
    },
    addNewAction() {
      axios.post('http://localhost:8000/api/actions', this.formData)
        .then(response => {
          console.log('Action added successfully:', response.data);
          // Optionally, reset form data or show a success message
          this.fetchActions();
        })
        .catch(error => {
          console.error('Error adding action:', error);
          this.error = error.message;
        });
    },
    deleteAction(actionId) {
      axios.delete(`http://localhost:8000/api/actions/${actionId}`)
        .then(response => {
          console.log('Action deleted successfully:', response.data);
          // Update the list of actions after deletion
          this.fetchActions();
        })
        .catch(error => {
          console.error('Error deleting action:', error);
        });
    },
    updateOwnerContact() {
      if (!this.id || !this.newOwnerName) {
        console.error('ID and new owner contact name are required');
        return;
      }
      axios.put(`http://localhost:8000/api/actions/${this.id}`, { owner_contact_name: this.newOwnerName })
        .then(response => {
          console.log('Owner contact name updated successfully:', response.data);
          // Optionally, reset form data or show a success message
          this.fetchActions();
        })
        .catch(error => {
          console.error('Error updating owner contact name:', error);
          this.error = error.message;
        });
    }
  }
}
</script>
