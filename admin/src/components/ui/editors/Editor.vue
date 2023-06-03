<script lang="ts" setup>
import {EditorContent, useEditor} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import {defineProps, ref, watch} from "vue";
import Underline from '@tiptap/extension-underline'
import Table from '@tiptap/extension-table'
import TableCell from '@tiptap/extension-table-cell'
import TableHeader from '@tiptap/extension-table-header'
import TableRow from '@tiptap/extension-table-row'
import TextAlign from '@tiptap/extension-text-align'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import {Link} from "@tiptap/extension-link";
import Image from '@tiptap/extension-image';
import EditorItem from '@/components/ui/editors/EditorItem.vue'
// import type {FilesTypes} from "@/types";

interface Props {
  modelValue: string;
  placeholder: string;
}

const link = ref({
  linkDialog: false,
  url: '',
})

const fileLink = ref({
  fileDialog: false,
  url: '',
  alt: '',
})

const fileManager = ref({
  fileDialog: false,
})

const setLink = () => {
  link.value.url = editor.value?.getAttributes('link').href
  link.value.linkDialog = true
}

const setLinkConfirm = async () => {
  if (link.value.url === '') {
    await editor.value?.chain()
        .focus()
        .extendMarkRange('link')
        .unsetLink()
        .run()
    link.value.linkDialog = false
    return
  }

  await editor.value?.chain()
      .focus()
      .extendMarkRange('link')
      .setLink({href: link.value.url})
      .run()
  link.value.linkDialog = false
}

// const setFileFromFileManager = async (file: FilesTypes) => {
//   if (file) {
//     await editor.value?.chain().focus().setImage({src: file.full_path, alt: file.description}).run()
//   }
//   fileManager.value.fileDialog = false
// }

const setFile = () => {
  fileLink.value.url = ''
  fileLink.value.fileDialog = true
}

const setFileConfirm = async () => {
  console.log(fileLink.value.url)
  await editor.value?.chain().focus().setImage({src: fileLink.value.url, alt: fileLink.value.alt}).run()
  fileLink.value.fileDialog = false
}

const emits = defineEmits(['update:modelValue'])
const props = defineProps<{
  modelValue: object
  placeholder?: string
}>()

const editor = useEditor({
  content: props.modelValue,
  extensions: [
    StarterKit,
    Document,
    Paragraph,
    Text,
    Underline,
    Table.configure({
      HTMLAttributes: {
        class: 'custom-class',
      },
      resizable: true,
    }),
    TableRow,
    TableHeader,
    TableCell,
    TextAlign.configure({
      types: ['heading', 'paragraph'],
    }),
    Image.configure({
      inline: true,
      allowBase64: true,
    }),
    Link.configure({
      protocols: ['ftp', 'mailto',
        {
          scheme: 'tel',
          optionalSlashes: true
        }
      ],
    })

  ],
  onUpdate: ({editor}) => {
    emits('update:modelValue', editor.getHTML())
  },
})

watch(
    () => props.modelValue,
    (newVal: any) => {
      const isSame = editor.value?.getHTML() === newVal

      if (isSame) {
        return
      }

      editor.value?.commands.setContent(newVal.value, false)
    }
);
</script>

<template>
  <div class="editor">
    <div class="editor-element">
      <button @click="editor?.chain().focus().toggleBold().run()"
              :disabled="!editor?.can().chain().focus().toggleBold().run()"
              :class="{ 'is-active': editor?.isActive('bold') }">
          <font-awesome-icon icon="fa-solid fa-bold" />
      </button>
      <button @click="editor?.chain().focus().toggleItalic().run()"
              :disabled="!editor?.can().chain().focus().toggleItalic().run()"
              :class="{ 'is-active': editor?.isActive('italic') }">
        <i class="fa-solid fa-italic"></i>
      </button>
      <button @click="editor?.chain().focus().toggleStrike().run()"
              :disabled="!editor?.can().chain().focus().toggleStrike().run()"
              :class="{ 'is-active': editor?.isActive('strike') }">
        <i class="fa-solid fa-strikethrough"></i>
      </button>
      <button @click="editor?.chain().focus().toggleUnderline().run()"
              :class="{ 'is-active': editor?.isActive('underline') }">
        <i class="fa-solid fa-underline"></i>
      </button>
      <button @click="editor?.chain().focus().toggleBulletList().run()"
              :class="{ 'is-active': editor?.isActive('bulletList') }">
        <i class="fa-solid fa-list"></i>
      </button>
      <button @click="editor?.chain().focus().toggleOrderedList().run()"
              :class="{ 'is-active': editor?.isActive('orderedList') }">
        <i class="fa-solid fa-list-1-2"></i>
      </button>
      <button @click="editor?.chain().focus().setParagraph().run()"
              :class="{ 'is-active': editor?.isActive('paragraph') }">
        <i class="fa-solid fa-paragraph"></i>
      </button>
      <button @click="editor?.chain().focus().toggleHeading({ level: 1 }).run()"
              :class="{ 'is-active': editor?.isActive('heading', { level: 1 }) }">
        h1
      </button>
      <button @click="editor?.chain().focus().toggleHeading({ level: 2 }).run()"
              :class="{ 'is-active': editor?.isActive('heading', { level: 2 }) }">
        h2
      </button>
      <button @click="editor?.chain().focus().toggleHeading({ level: 3 }).run()"
              :class="{ 'is-active': editor?.isActive('heading', { level: 3 }) }">
        h3
      </button>
      <button @click="editor?.chain().focus().toggleHeading({ level: 4 }).run()"
              :class="{ 'is-active': editor?.isActive('heading', { level: 4 }) }">
        h4
      </button>
      <button @click="editor?.chain().focus().toggleHeading({ level: 5 }).run()"
              :class="{ 'is-active': editor?.isActive('heading', { level: 5 }) }">
        h5
      </button>
      <button @click="editor?.chain().focus().toggleHeading({ level: 6 }).run()"
              :class="{ 'is-active': editor?.isActive('heading', { level: 6 }) }">
        h6
      </button>
      <button @click="editor?.chain().focus().toggleCode().run()"
              :disabled="!editor?.can().chain().focus().toggleCode().run()"
              :class="{ 'is-active': editor?.isActive('code') }">
        <i class="fa-solid fa-code"></i>
      </button>
      <button @click="editor?.chain().focus().toggleCodeBlock().run()"
              :class="{ 'is-active': editor?.isActive('codeBlock') }">
        <i class="fa-solid fa-laptop-code"></i>
      </button>
      <button @click="editor?.chain().focus().toggleBlockquote().run()"
              :class="{ 'is-active': editor?.isActive('blockquote') }">
        <i class="fa-solid fa-quote-left"></i>
      </button>
      <button @click="editor?.chain().focus().setHorizontalRule().run()">
        <i class="fa-solid fa-minus"></i>
      </button>
      <button @click="editor?.chain().focus().setHardBreak().run()">
        <i class="fa-solid fa-xmarks-lines"></i>
      </button>
      <button @click="setLink">
        <i class="fa-solid fa-link"></i>
      </button>
      <button @click="fileManager.fileDialog = true">
        <i class="fa-solid fa-images"></i>
      </button>
      <button @click="setFile">
        <i class="fa-solid fa-image"></i>
      </button>
      <EditorItem>
        <template v-slot:top>
          <button>
            <v-icon icon="mdi-table"></v-icon>
          </button>
        </template>
        <template v-slot:dropdown>
          <button @click="editor?.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run()">
            Создать таблицу
          </button>
          <button @click="editor?.chain().focus().addColumnBefore().run()">
            Добавить колонку до
          </button>
          <button @click="editor?.chain().focus().addColumnAfter().run()">
            Добавить колонку после
          </button>
          <button @click="editor?.chain().focus().deleteColumn().run()">
            Удалить колонку
          </button>
          <button @click="editor?.chain().focus().addRowBefore().run()">
            Добавить строку до
          </button>
          <button @click="editor?.chain().focus().addRowAfter().run()">
            Добавить строку после
          </button>
          <button @click="editor?.chain().focus().deleteRow().run()">
            Удалить строку
          </button>
          <button @click="editor?.chain().focus().deleteTable().run()">
            Удалить таблицу
          </button>
          <button @click="editor?.chain().focus().mergeCells().run()">
            Объединить ячейки
          </button>
          <button @click="editor?.chain().focus().splitCell().run()">
            Разъединить ячейки
          </button>
          <button @click="editor?.chain().focus().toggleHeaderColumn().run()">
            Переключение шапки в колонки
          </button>
          <button @click="editor?.chain().focus().toggleHeaderRow().run()">
            Переключение шапки в строке
          </button>
          <button @click="editor?.chain().focus().toggleHeaderCell().run()">
            Переключение шапки в ячейке
          </button>
          <button @click="editor?.chain().focus().mergeOrSplit().run()">
            Объединить/разъединить ячейку
          </button>
          <button @click="editor?.chain().focus().setCellAttribute('colspan', 2).run()">
            setCellAttribute
          </button>
          <button @click="editor?.chain().focus().fixTables().run()">
            Сфокусироваться на таблице
          </button>
          <button @click="editor?.chain().focus().goToNextCell().run()">
            Перейти к следующей ячейки
          </button>
          <button @click="editor?.chain().focus().goToPreviousCell().run()">
            Перейти к предыдущей ячейки
          </button>
        </template>
      </EditorItem>
      <button @click="editor?.chain().focus().setTextAlign('left').run()"
              :class="{ 'is-active': editor?.isActive({ textAlign: 'left' }) }">
        <i class="fa-solid fa-align-left"></i>
      </button>
      <button @click="editor?.chain().focus().setTextAlign('center').run()"
              :class="{ 'is-active': editor?.isActive({ textAlign: 'center' }) }">
        <i class="fa-solid fa-align-center"></i>
      </button>
      <button @click="editor?.chain().focus().setTextAlign('right').run()"
              :class="{ 'is-active': editor?.isActive({ textAlign: 'right' }) }">
        <i class="fa-solid fa-align-right"></i>
      </button>
      <button @click="editor?.chain().focus().setTextAlign('justify').run()"
              :class="{ 'is-active': editor?.isActive({ textAlign: 'justify' }) }">
        <i class="fa-solid fa-align-justify"></i>
      </button>
      <button class="editor-clear" @click="editor?.chain().focus().unsetTextAlign().run()">
        <i class="fa-solid fa-remove-format"></i>
      </button>
      <button class="editor-clear" @click="editor?.chain().focus().unsetAllMarks().run()">
        <v-icon icon="mdi-autorenew"></v-icon>
        M
      </button>
      <button class="editor-clear" @click="editor?.chain().focus().clearNodes().run()">
        <v-icon icon="mdi-autorenew"></v-icon>
        N
      </button>
      <button class="editor-clear" @click="editor?.chain().focus().undo().run()"
              :disabled="!editor?.can().chain().focus().undo().run()">
        <i class="fa-solid fa-undo"></i>
      </button>
      <button class="editor-clear" @click="editor?.chain().focus().redo().run()"
              :disabled="!editor?.can().chain().focus().redo().run()">
        <i class="fa-solid fa-redo"></i>
      </button>
    </div>
    <div class="editor-view">
      <div class="editor-placeholder" v-if="placeholder">
        {{ placeholder }}
      </div>
      <editor-content :editor="editor" view/>
    </div>
    <div class="dialogs">
      <v-dialog
          v-model="link.linkDialog"
          width="400"
      >
        <v-card>
          <v-card-title>
            <span class="text-h6">Добавление ссылки</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12">
                  <v-text-field
                      density="compact"
                      label="Ссылка"
                      placeholder="https://tekopro.kg/products/"
                      variant="outlined"
                      required
                      v-model="link.url"
                      hide-details
                  ></v-text-field>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
                color="blue-darken-1"
                variant="text"
                @click="link.linkDialog = false"
            >
              Отменить
            </v-btn>
            <v-btn
                color="blue-darken-1"
                variant="text"
                @click="setLinkConfirm"
            >
              Сохранить
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-dialog
          v-model="fileLink.fileDialog"
          width="400"
      >
        <v-card>
          <v-card-title>
            <span class="text-h6">Добавление изображения по ссылке</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12">
                  <v-text-field
                      density="compact"
                      label="Ссылка"
                      placeholder="https://tekopro.kg/products.jpeg"
                      variant="outlined"
                      required
                      v-model="fileLink.url"
                      hide-details
                  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <v-text-field
                      density="compact"
                      label="Тэг ALT"
                      placeholder="Описание изображения Alt"
                      variant="outlined"
                      required
                      v-model="fileLink.alt"
                      hide-details
                  ></v-text-field>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
                color="blue-darken-1"
                variant="text"
                @click="fileLink.fileDialog = false"
            >
              Отменить
            </v-btn>
            <v-btn
                color="blue-darken-1"
                variant="text"
                @click="setFileConfirm"
            >
              Сохранить
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
<!--      <FileSelect v-model="fileManager.fileDialog" @selectFile="setFileFromFileManager"></FileSelect>-->
    </div>
  </div>
</template>

<style>
.editor {
  border: 1px solid grey;
  padding: 15px;
  border-radius: 4px;
  margin: 16px 0;
}

.editor-view {
  max-height: 450px;
  overflow: auto;
}

.ProseMirror-focused {
  outline: none;
}

.editor-element {
  display: flex;
  flex-wrap: wrap;
  gap: 5px;
  margin-bottom: 10px;
}

.editor-element button {
  min-width: 30px;
  height: 30px;
  border: 1px solid grey;
  border-radius: 4px;
  font-weight: bold;
  text-transform: uppercase;
  font-size: 12px;
  padding: 0 5px;
}

.editor-element button.is-active {
  color: grey;
}

.editor-element button.editor-clear {
  background-color: #640202;
}

.editor-view li {
  margin-left: 20px;
}

.editor-placeholder {
  font-size: 12px;
  color: grey;
}

.ProseMirror table {
  border-collapse: collapse;
  table-layout: fixed;
  width: 100%;
  margin: 0;
  overflow: hidden;
}

.ProseMirror table td, .ProseMirror table th {
  min-width: 1em;
  border: 1px solid #ced4da;
  padding: 3px 5px;
  vertical-align: top;
  box-sizing: border-box;
  position: relative;
}

.ProseMirror table td > *, .ProseMirror table th > * {
  margin-bottom: 0;
}

.ProseMirror table th {
  font-weight: bold;
  text-align: left;
  background-color: #525252;
}

.ProseMirror table .selectedCell:after {
  z-index: 2;
  position: absolute;
  content: "";
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: rgba(200, 200, 255, 0.4);
  pointer-events: none;
}

.ProseMirror table .column-resize-handle {
  position: absolute;
  right: -2px;
  top: 0;
  bottom: -2px;
  width: 4px;
  background-color: #adf;
  pointer-events: none;
}

.ProseMirror table p {
  margin: 0;
}
.ProseMirror {
  min-height: 100px;
}
.tableWrapper {
  padding: 1rem 0;
  overflow-x: auto;
}

.resize-cursor {
  cursor: ew-resize;
  cursor: col-resize;
}

</style>
