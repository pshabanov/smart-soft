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
}

export interface ServicesRequestType {
    id: number
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
    solution: string
    image: string
    active: boolean
}