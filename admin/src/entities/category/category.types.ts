import type { Icon, Image } from '@/entities/image/image.types'
import type { LangModel, TranslateFields } from '@/shared/lang/lang.model'

export interface CategoryRouterElement {
    id: number
    name: string
    path?: string
    child: CategoryRouterElement[]
}
type Lang = Record<LangModel, TranslateFields>

export interface Category {
    id?: number
    translations: Lang
    slug: string
    priority: number
    active: boolean
    parent_id?: number | null
    images: Image[]
    icon?: Icon
}
