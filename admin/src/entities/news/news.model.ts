export interface NewsRequestType {
    id: number
    title: string
    description: string
    image: string
    active: boolean
}

export interface BannersRequestType {
    id: number
    title: string
    link: string
    image: string
    gradient_start: string|null
    gradient_end: string|null
    active: boolean
}
