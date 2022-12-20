<template>
    <v-card>
      <v-card-title>
        USER LIST
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="desserts"
        :search="search"
      ></v-data-table>
    </v-card>
  </template>

<script>
export default {
  data () {
    return {
      search: '',
      headers: [
        {
          text: 'ID',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'NAME', value: 'calories' },
        { text: 'EMAIL ', value: 'fat' },
        { text: 'ROLE', value: 'carbs' },
        { text: 'ACTION', value: 'protein' },
       
      ],
      desserts: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
      
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: '1%',
        },
      
      ],
    }
  },
}
</script>