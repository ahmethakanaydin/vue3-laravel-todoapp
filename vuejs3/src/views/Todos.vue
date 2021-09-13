<template>
  <div class="container mx-auto">
    <h1 class="mt-8 text-2xl">Todolar</h1>

    <div class="mt-3">
      <div class="grid grid-cols-12 gap-4">
        <div class="col-span-6 space-y-4 px-1" style="height: 500px">
          <div
            v-for="(todo, index) in state.todos"
            :key="index"
            class="p-8 bg-white shadow-md rounded flex items-center justify-between"
            :class="{ 'bg-green-200': todo.done }"
          >
            <div>
              <div>{{ todo.text }}</div>
              <div class="text-gray-500 text-sm">
                Eklendiği Tarih: {{ todo.created_at.slice(0, 10) }}
              </div>
            </div>
            <div class="space-x-2">
              <button
                class="px-2 text-red-600"
                @click="removeTodo(todo)"
                title="Remove todo"
              >
                &times;
              </button>
              <button
                v-if="!todo.done"
                class="px-2 text-green-600"
                @click="markAsDone(todo)"
                title="Mark as done"
              >
                &check;
              </button>
              <button
                v-else
                class="px-2 text-orange-600"
                @click="markAsUndone(todo)"
                title="Mark as undone"
              >
                &#8630;
              </button>
            </div>
          </div>
          <div
            v-if="state.todos.length === 0"
            class="px-8 py-16 bg-white text-gray-700 shadow-md rounded text-sm"
          >
            Henüz hiç todo eklenmedi.
          </div>
        </div>

        <div class="col-span-6">
          <div class="p-8 bg-white shadow-md rounded">
            <h2 class="text-xl">Todo Ekle</h2>
            <div class="row">
              <div class="col-10">
                <input
                  type="text"
                  v-model="state.todoText"
                  @keydown.enter="addTodo"
                  class="p-2 mt-4 border rounded w-full"
                />
              </div>
              <div class="col-2 mt-4">
                <button @click="addTodo" class="btn btn-primary">Ekle</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { defineComponent, reactive } from "vue";

export default defineComponent({
  setup() {
    const state = reactive({
      todos: [],
      todoText: "",
    });

    function addTodo() {
      axios
        .post("http://localhost:8000/api/store-todo", {
          text: state.todoText,
        })
        .then(() => {
          state.todoText = "";
          getTodos();
        });
    }

    function markAsDone(todo) {
      axios
        .post("http://localhost:8000/api/todo/mark-as-done", {
          id: todo.id,
        })
        .then(() => getTodos());
    }

    function markAsUndone(todo) {
      axios
        .post("http://localhost:8000/api/todo/mark-as-undone", {
          id: todo.id,
        })
        .then(() => getTodos());
    }

    function removeTodo(todo) {
      if (!confirm("Silmek istediğine emin misin?")) {
        return;
      }

      axios
        .post("http://localhost:8000/api/delete-todo", {
          id: todo.id,
        })
        .then(() => getTodos());
    }

    function getTodos() {
      axios.get("http://localhost:8000/api/todos").then((response) => {
        state.todos = response.data;
      });
    }

    getTodos();

    return {
      state,
      addTodo,
      markAsDone,
      markAsUndone,
      removeTodo,
    };
  },
});
</script>
