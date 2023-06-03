<script>

export default {
  name: 'EditorItem',
  data() {
    return {
      isActive: false,
    }
  },

  methods: {
    openDropDown() {
      this.isActive = !this.isActive
    },

    closeDropDown() {
      if (this.isActive) {
        this.isActive = false
      }
    }
  }
}
</script>

<template>
  <li v-click-outside="closeDropDown" class="editor-dropdown__item editor-dropdown__item-custom">
    <div @click="openDropDown">
      <slot name="top"></slot>
    </div>
    <ul :class="{ 'active-editor-item' : isActive }">
      <slot name="dropdown"></slot>
    </ul>
  </li>
</template>

<style>

.editor-dropdown__item {
  position: relative;
  list-style: none;
}

.editor-dropdown__item-custom ul {
  transform: scaleY(0);
  transform-origin: top left;
  transition: 0.5s;
  position: absolute;
  top: 100%;
  right: 0;
  background: #180808;
  list-style: none;
  z-index: 200;
  padding: 10px;
  display: flex;
  gap: 5px;
  flex-wrap: wrap;
  max-height: 250px;
  overflow: auto;
}

.editor-dropdown__item-custom ul button {
  width: 100%;
  height: auto;
  font-size: 10px;
}

.editor-dropdown__item-custom ul.active-editor-item {
  transform: scaleY(1);
}
</style>
