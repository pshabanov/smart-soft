export interface NewsRequestType {
    id: number
    title: string
    description: string
    image: string
    active: boolean
}

export interface BannersRequestType {
    id: number
    position: number
    title: string
    description: string
    link: string
    image: string
    gradient_start: string
    gradient_end: string
    gradient_under_info: string
    active: boolean
}

export interface RGBA {
    r: number
    g: number
    b: number
    a?: number
}

export interface ReviewRequestType {
    id: number
    text: string
    company: string
    image: string
    active: boolean
}

export interface CertificatesRequestType {
    id: number
    title: string
    image: string
    active: boolean
    position: number
}

export interface ServicesRequestType {
    id: number
    position: number
    title: string
    description: string
    short_description: string
    price: string | null
    image: string
    active: boolean
}

export interface SolutionsRequestType {
    id: number
    title: string
    description: string
    about_company: string
    solution: string
    image: string
    active: boolean
}