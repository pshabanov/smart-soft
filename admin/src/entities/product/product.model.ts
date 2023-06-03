//* #productName-ru-kg
//* #description-ru-kg
// #slug
// #EAN или SKU (код артикула)
// #active
// #?priority
//     #catecory[]
// #filtres
// #attributes
// #?relatedProducts(Cопутствующие товары)

// #price
// #oldPrice
// #рассрочка(хз что тут пока что, это отдельная сущьность)

// #quantity
// #minimumQuantity

// #attributes[]

// #imageMain
// #subImages

// #ru-kg
// #MetaTagTitle-textfield!если нету значения, подставлять значение из title
// #MetaTagDescription-textarea-160!если нету значения, подставлять значение из description
// #MetaTagKeywords-chips-180


import type {  LangModel, TranslateFields } from '@/shared/lang/lang.model'



type Lang = Record<LangModel, TranslateFields>

export interface Product {
    id?: number
    parent_id: number
    translations: Lang
    slug: string
    name: string
    img: string
    description: string
    attributes?: string[]
    filters?: string[]

}
